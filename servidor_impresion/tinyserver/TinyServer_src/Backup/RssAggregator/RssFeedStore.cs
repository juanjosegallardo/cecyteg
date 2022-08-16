using System;
using System.Collections;
using Sloppycode.net;

namespace RssAggregator
{
	/// <summary>
	/// RssFeedStore
	/// Version: 0.1   draft
	/// Copyright 2004 (c) Stephan Meyn
	/// Role: a store for RSS Feeds
	/// Responsibilities:
	/// <list type="bullet">
	/// <item>knows individual RSS Feeds</item>
	/// <item>knows status of feeds</item>
	/// </list>
	/// </summary>
	public class RssFeedStore
	{
		#region private fields
		/// <summary>
		/// the RssFeed items are contained here by name
		/// </summary>
		private Hashtable feeds;
		#endregion

		#region public Attributes
		#endregion

		#region construction
		public RssFeedStore()
		{
			feeds = new Hashtable();
		}

		public ICollection Urls { get { return feeds.Keys; } }

		public RssFeed this[string url] { get { return feeds[url] as RssFeed;} set {feeds[url] = value;}}
		
		#endregion

		#region public methods
		/// <summary>
		/// add a feed URL
		/// </summary>
		/// <param name="URL"></param>
		public void AddFeed(string URL)
		{
			if (!feeds.ContainsKey(URL))
				feeds.Add(URL, null);
		}
		/// <summary>
		/// remove a feed URL and the most recent feed
		/// </summary>
		/// <param name="URL"></param>
		public void RemoveFeed(string URL)
		{
			if (feeds.ContainsKey(URL))
				feeds.Remove(URL);
		}
		#endregion

		#region private methods
		#endregion
	}
}
