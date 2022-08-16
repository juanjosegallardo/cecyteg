using System;
using TinyServerLib;

namespace WebServer
{
	/// <summary>
	/// this class kicks it off
	/// </summary>
	class ServerHost
	{
		/// <summary>
		/// Example application to host a server
		/// </summary>
		[STAThread]
		static void Main(string[] args)
		{
			try
			{
				TinyServerLib.TinyServer server = new TinyServerLib.TinyServer();
				configure(server);
				server.Run();
				Console.WriteLine("Server running. Hit Enter to exit");
				Console.ReadLine();
				server.Stop();
				Console.WriteLine("Server stopped successfully");
			}
			catch (Exception ex)
			{
				Console.WriteLine("Listener died with exception {0}", ex.Message);
				Console.WriteLine(ex.StackTrace);
			}
			Console.WriteLine("-- hit enter to exit --");
			Console.ReadLine();
		}
		private static void configure(TinyServerLib.TinyServer server)
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
	}
}
