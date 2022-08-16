using System;
using TinyServerLib;
using System.Web.UI;
using System.IO;
using Sloppycode.net;

namespace RssAggregator
{
	/// <summary>
	/// AggServer
	/// Version: 0.1   draft
	/// Copyright 2004 (c) Stephan Meyn
	/// Role:
	/// Responsibilities:
	/// <list type="bullet">
	/// <item></item>
	/// </list>
	/// 
	/// 
	/// </summary>
	public class AggServer:  TinyServerLib.TinyServer
	{
		private RssFeedStore store;

		public AggServer(RssFeedStore store2Use)
		{
			store = store2Use;
		}

		protected override void doGet(string argument)
		{
			this.sendOk();
			this.sendString(writeLinkPage());
		}

		private string writeLinkPage()
		{
			// get templates 
			string feedTemplate = getTemplate("feedTemplate.htm");
			string itemTemplate = getTemplate("itemTemplate.htm");

			StringWriter sw = new StringWriter();
			HtmlTextWriter writer = new HtmlTextWriter(sw);
			writer.WriteFullBeginTag("html");
			writer.WriteLine();

			writer.WriteFullBeginTag("body");
			writer.WriteLine();


			foreach (string url in store.Urls)
			{
				RssFeed feed = store[url];
				writer.Write(
					RssReader.CreateHtml(feed,feedTemplate, itemTemplate, "", 20));
				writer.WriteLine();
			}
			writer.WriteEndTag("body");
			writer.WriteLine();
			writer.WriteEndTag("html");
			writer.WriteLine();
			return sw.ToString();
		}

		/// <summary>
		/// get the template contents
		/// </summary>
		/// <param name="path"></param>
		/// <returns></returns>
		private string getTemplate(string path)
		{
			string templatePath = this.template(path);
			string contents = string.Empty;
			using (StreamReader sr = File.OpenText(templatePath))
			{
				contents = sr.ReadToEnd();
			}
			return contents;
		}
	}
}
