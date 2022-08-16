using System;
using System.Threading;
using System.Xml;

namespace RssAggregator
{
	/// <summary>
	/// This is the host that will run the aggregator
	/// </summary>
	class Host
	{
		/// <summary>
		/// The main entry point for the application.
		/// </summary>
		[STAThread]
		static void Main(string[] args)
		{
			Aggregator agg = new Aggregator();
			configure(agg);
			Thread aggThread = new Thread(new ThreadStart(agg.Run));
			aggThread.IsBackground = true; // thread dies when this routine ends
			aggThread.Start();
			Console.WriteLine("Aggregator Started. Hit Enter to terminate");
			Console.ReadLine();
			Console.WriteLine("Good bye");
		}

		private static void configure(Aggregator agg)
		{
			if (System.Configuration.ConfigurationSettings.AppSettings["milliSecondToSleep"] != string.Empty)
				try 
				{
					int ms = int.Parse(System.Configuration.ConfigurationSettings.AppSettings["milliSecondToSleep"]);
					agg.MilliSecondsToSleep = ms;
				}
				catch (Exception) {}
			
			string feedPath = System.Configuration.ConfigurationSettings.AppSettings["feeds"];
			XmlDocument xmlDoc= new XmlDocument();
			
			try
			{
				xmlDoc.Load(feedPath);
				XmlNode rssFeedsNode = null;

				// Loop child nodes till we find the rssFeed 
				for (int i=0;i < xmlDoc.ChildNodes.Count;i++)
					if (xmlDoc.ChildNodes[i].Name.ToUpper() == "RSSFEEDS")
					{
						rssFeedsNode = xmlDoc.ChildNodes[i];
						break;
					}
				// parse all feeds
				for (int idxFeed = 0; idxFeed< rssFeedsNode.ChildNodes.Count; idxFeed++)
				{
					if (rssFeedsNode.ChildNodes[idxFeed].Name.ToUpper() == "RSS")
					{
						agg.AddRssUrl(rssFeedsNode.ChildNodes[idxFeed].InnerText);
					}
				}
			}
			catch (XmlException err)
			{
				Console.WriteLine("Error in configuration file {0}.\r\n Error: {1}",
					feedPath, err.Message);
			}

		}
	}
}
