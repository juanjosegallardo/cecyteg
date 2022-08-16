using System;
using System.Threading;
using System.Collections;
using Sloppycode.net;
using TinyServerLib;

namespace RssAggregator
{
	/// <summary>
	/// Aggregator
	/// Version: 0.1   draft
	/// Copyright 2004 (c) Stephan Meyn
	/// Role: aggregate feeds
	/// Responsibilities:
	/// <list type="bullet">
	/// <item>Can read app config for RSS urls</item>
	/// <item>Can download RSS items on regular basis</item>
	/// <item>Can provide RSS Summary page via web server</item>
	/// </list>
	/// 
	/// 
	/// </summary>
	public class Aggregator
	{
		#region private fields
		private RssFeedStore store;
		private int milliSecondsToSleep = 10000;
		private AggServer server;
		#endregion

		#region public Attributes
		/// <summary>
		/// sleep interval between each check to see if feeds need updating
		/// </summary>
		public int MilliSecondsToSleep { get { return milliSecondsToSleep;} set { milliSecondsToSleep = value;}}
		#endregion

		#region construction
		public Aggregator()
		{
			store = new RssFeedStore();
			server = new AggServer(store);
		}

		#endregion

		#region public methods
		/// <summary>
		/// regularly poll the feeds and keep them upto date
		/// this method should be called in a separate thread.
		/// </summary>
		public void Run()
		{
			configure(server);
			try
			{
				server.Run();
				for(;;)
				{
					checkFeeds();
					Thread.Sleep(MilliSecondsToSleep);
				}
			}
			finally
			{
				server.Stop();
			}
		}
		/// <summary>
		/// add another RSS URL
		/// </summary>
		/// <param name="url"></param>
		public void AddRssUrl(string url)
		{
			store.AddFeed(url);
		}
		#endregion



		#region private methods

		/// <summary>
		/// do the rounds
		/// </summary>
		private void checkFeeds()
		{
			ArrayList forUpdate = new ArrayList();
			foreach (string url in store.Urls)
			{
				RssFeed feed = store[url];
				bool needsUpdating = false;
				if (feed == null)
					needsUpdating = true;
				else
				{
					TimeSpan age = DateTime.Now.Subtract(feed.LastDownloaded);
					needsUpdating = (age.Hours > 0) ;
				}
				if (needsUpdating)
					forUpdate.Add(url);
			}
			foreach(string url in forUpdate)
			{
				updateFeed(url);
			}
		}
		/// <summary>
		/// update the store
		/// </summary>
		/// <param name="url"></param>
		private void updateFeed(string url)
		{
			System.Diagnostics.Debug.WriteLine("Update RSSFeed", url);

			Console.WriteLine("{0}:Updating Feed: {1}",DateTime.Now.TimeOfDay, url);
			RssFeed feed = RssReader.GetFeed(url);
			store[url] = feed;
		}

		#endregion

		#region server
		private void configure(AggServer server)
		{
			server.Templates   = System.Configuration.ConfigurationSettings.AppSettings["TemplatePath"];
			server.DefaultPage = System.Configuration.ConfigurationSettings.AppSettings["Default"];
			server.WebRootPath = System.Configuration.ConfigurationSettings.AppSettings["WebRoot"];
			server.Port = int.Parse(System.Configuration.ConfigurationSettings.AppSettings["Port"]);
			server.LogFile =  System.Configuration.ConfigurationSettings.AppSettings["LogFile"];
			string logLevel =System.Configuration.ConfigurationSettings.AppSettings["LogLevel"].ToUpper();
			switch (logLevel) 
			{
				case "ALL":server.LogLevel = TinyServerLib.LogKind.Informational;
					break;
				case "WARNING":server.LogLevel = TinyServerLib.LogKind.Warning;
					break;
				case "ERROR":server.LogLevel = TinyServerLib.LogKind.Error;
					break;
				case "NONE":server.LogLevel = TinyServerLib.LogKind.None;
					break;
			}
		}
		#endregion
	}
}
