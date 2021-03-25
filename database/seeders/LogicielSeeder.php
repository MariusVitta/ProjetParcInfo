<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use App\Models\Logiciel;

	class LogicielSeeder extends Seeder {

        /* Remplissage de la table "logiciels" */
	    public function run() {

	        Logiciel::create([
	        	"nom_logiciel" => "7Zip",
	        	"editeur" => "Igor Pavlov",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "LGPL",
	        	"siteWeb" => "http://7-zip.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Acrobat Reader",
	        	"editeur" => "Adobe",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://acrobat.adobe.com/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Adobe flashplayer ",
	        	"editeur" => "Adobe",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://www.adobe.com/products/flashplayer.html"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Algobox",
	        	"editeur" => "Pascal Brachet",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL",
	        	"siteWeb" => "http://www.xm1math.net/algobox/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Androïd Studio",
	        	"editeur" => "Google",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Apache 2.0",
	        	"siteWeb" => "http://developer.android.com/sdk/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Ant",
	        	"editeur" => "Apache Software Foundation",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Apache 2.0",
	        	"siteWeb" => "https://maven.apache.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Audacity",
	        	"editeur" => "Audacity team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 2.0",
	        	"siteWeb" => "http://audacityteam.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Atelier B",
	        	"editeur" => "Clearsy Systsems Engineeering",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Licence Atelier B V4",
	        	"siteWeb" => "http://www.atelierb.eu/telecharger-latelier-b/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Atom",
	        	"editeur" => "GitHub, Inc.",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "MIT",
	        	"siteWeb" => "https://atom.io/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Blender",
	        	"editeur" => "Fondation Blender",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 2.0 et 3.0",
	        	"siteWeb" => "https://www.blender.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Brackets",
	        	"editeur" => "Adobe",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "MIT",
	        	"siteWeb" => "http://brackets.io/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Google Chrome",
	        	"editeur" => "Google",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "http://chrome.com/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Cisco Packet Tracer ",
	        	"editeur" => "Cisco Systems",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://www.netacad.com/web/about-us/cisco-packet-tracer"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Client telnet",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://technet.microsoft.com/en-us/library/cc771275(v=ws.10).aspx"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Client RDP ",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://technet.microsoft.com/en-us/library/dn473009(v=ws.11).aspx"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "DB-main",
	        	"editeur" => "Rever",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "http://www.rever.eu/en/db-main-download-form"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Dialang",
	        	"editeur" => "Lancaster University",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "http://www.lancaster.ac.uk/researchenterprise/dialang/about.htm"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "EasyPhp",
	        	"editeur" => "EasyPhp Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL",
	        	"siteWeb" => "http://www.easyphp.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Eclipse",
	        	"editeur" => "Eclipse Foundation",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Eclipse Public License",
	        	"siteWeb" => "https://www.eclipse.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Eclipse Papyrus",
	        	"editeur" => "CEA-List, Atos, LIFL",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Eclipse Public License",
	        	"siteWeb" => "http://eclipse.org/papyrus"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Eclipse Mars x64 plugin checkstyle",
	        	"editeur" => "Checkstyle Team",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "GNU/GPL",
	        	"siteWeb" => "http://checkstyle.sourceforge.net/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Eclipse Mars x64 plugin findbugs",
	        	"editeur" => "Bill Pugh and David Hovemeyer",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "GNU/GPL",
	        	"siteWeb" => "http://findbugs.sourceforge.net/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Eclipse Mars x64 plugin eGit et GitHub",
	        	"editeur" => "Eclipse Team",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "EPL",
	        	"siteWeb" => "http://www.eclipse.org/egit/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Eclipse Mars x64 plugin jdepend",
	        	"editeur" => "Andrey Loskutov",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "EPL",
	        	"siteWeb" => "http://marketplace.eclipse.org/content/jdepend4eclipse"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Eclipse Mars x64 plugin PMD",
	        	"editeur" => "Philip Graf",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "",
	        	"siteWeb" => "https://pmd.github.io/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Firefox",
	        	"editeur" => "Mozilla Foundation",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "MPL 2.0",
	        	"siteWeb" => "https://mozilla.org/firefox"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Filezilla",
	        	"editeur" => "Tim Kosse",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 2.0",
	        	"siteWeb" => "https://filezilla-project.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Freemind",
	        	"editeur" => "Freemind Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 2.0",
	        	"siteWeb" => "http://freemind.sourceforge.net/wiki/index.php/Main_Page"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Freeplane",
	        	"editeur" => "Dimitry Polivaev, et al.",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 2.0",
	        	"siteWeb" => "https://www.freeplane.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "GanttProject",
	        	"editeur" => "The GanttProject Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL",
	        	"siteWeb" => "http://www.ganttproject.biz/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Geany",
	        	"editeur" => "Geany Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 2.0",
	        	"siteWeb" => "http://www.geany.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Geogebra",
	        	"editeur" => "Geogebra Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GeoGebra License et GNU/GPL 3.0",
	        	"siteWeb" => "http://www.geogebra.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Gimp",
	        	"editeur" => "The GIMP Development Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 3.0",
	        	"siteWeb" => "https://www.gimp.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Git",
	        	"editeur" => "Git Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL-LGPL 2.0",
	        	"siteWeb" => "https://git-scm.com/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Inkscape",
	        	"editeur" => "Inkscape team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 3.0",
	        	"siteWeb" => "https://inkscape.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "IntelliJ",
	        	"editeur" => "JetBrains",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire et Apache 2.0",
	        	"siteWeb" => "http://www.jetbrains.com/idea/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Internet Explorer",
	        	"editeur" => "",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "LGPL",
	        	"siteWeb" => ""
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Java (JRE, JDK, JVM, etc.)",
	        	"editeur" => "Oracle",
	        	"type_logiciel" => "Logiciel et code source",
	        	"licence" => "GNU/GPL",
	        	"siteWeb" => "http://www.oracle.com/technetwork/indexes/downloads/index.html#java"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Komposer",
	        	"editeur" => "Komposer team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "MPL/GPL/LGPL ",
	        	"siteWeb" => "http://kompozer.net/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "LeJOS NXJ LEGO",
	        	"editeur" => "LeJOSTeam",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "Unknown",
	        	"siteWeb" => "http://www.lejos.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Libreoffice",
	        	"editeur" => "The Document Foundation",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "MPL/GPL/LGPL  3.0 et Apache 2.0",
	        	"siteWeb" => "https://www.libreoffice.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Maven",
	        	"editeur" => "Apache Software Foundation",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Apache 2.0",
	        	"siteWeb" => "https://maven.apache.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft .NET Framework 4.5.2 ",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire, Apache 2.0, BSD, MIT, Microsoft Reference License (Ms-RSL)",
	        	"siteWeb" => "https://microsoft.com/net"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft ASP.NET MVC 4 - Visual Studio 2013 - ENU",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "Apache 2.0",
	        	"siteWeb" => "http://www.asp.net/mvc"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft ASP.NET MVC 4 Runtime",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "Apache 2.0",
	        	"siteWeb" => "http://www.asp.net/mvc"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft Office Starter 2010 (word/excel)",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://www.office.com/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft SQL Server 2012 Native Client",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://msdn.microsoft.com/fr-fr/library/cc280510.aspx"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft SQL Server 2012 (64 bits)",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "http://www.microsoft.com/sqlserver/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft Visual Studio 2013 Professionnel",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Freemium",
	        	"siteWeb" => "http://visualstudio.com/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft Project Professionnel 2016",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://products.office.com/fr-fr/project/project-professional-desktop-software"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Microsoft Visio Professionnel 2016",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://products.office.com/fr-fr/visio/visio-professional-business-and-diagram-software"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Matelo",
	        	"editeur" => "ALL4TEC",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "http://www.all4tec.net/fr/matelo-model-based-testing-tool"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Modelio",
	        	"editeur" => "Modeliosoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GPL, Apache 2.0 et EULA",
	        	"siteWeb" => "http://www.modelio.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "MySQL Connector Net ",
	        	"editeur" => "Oracle",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GPL",
	        	"siteWeb" => "https://dev.mysql.com/downloads/connector/net/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "MySQL Connector/ODBC 5.3",
	        	"editeur" => "Oracle",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GPL",
	        	"siteWeb" => "https://dev.mysql.com/downloads/connector/odbc/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "MySQL Workbench",
	        	"editeur" => "Oracle",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GPL",
	        	"siteWeb" => "http://www.mysql.com/products/workbench/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Netlogo",
	        	"editeur" => "Uri Wilensky (CCL)",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GPL",
	        	"siteWeb" => "http://ccl.northwestern.edu/netlogo/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Notepad++",
	        	"editeur" => "Don Ho",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GPL",
	        	"siteWeb" => "https://notepad-plus-plus.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Open office",
	        	"editeur" => "Apache Software Foundation",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "SISSL and GNU/LGPL",
	        	"siteWeb" => "https://www.openoffice.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Opera",
	        	"editeur" => "Opera Software ASA",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Freeware",
	        	"siteWeb" => "http://www.opera.com/fr"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Photofiltre",
	        	"editeur" => "Antonio Da Cruz",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Freeware et shareware",
	        	"siteWeb" => "http://www.photofiltre.com/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "QT",
	        	"editeur" => "The Qt Company",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Qt Commercial License, GPL 2.0, 3.0 et LGPL 3.0",
	        	"siteWeb" => "https://www.qt.io/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "QT 'Visual Studio Add-in'",
	        	"editeur" => "The Qt Company",
	        	"type_logiciel" => "Plugin",
	        	"licence" => "Qt Commercial License, GPL 2.0, 3.0 et LGPL 3.0",
	        	"siteWeb" => "https://www.qt.io/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "QuickTime 7",
	        	"editeur" => "Apple",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Freemium",
	        	"siteWeb" => "http://apple.com/quicktime"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "R",
	        	"editeur" => "R Core Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL 2.0",
	        	"siteWeb" => "https://www.r-project.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Racket",
	        	"editeur" => "PLT Inc",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "LGPL",
	        	"siteWeb" => "http://racket-lang.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Scilab",
	        	"editeur" => "Scilab Enterprises",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GPL 2.0",
	        	"siteWeb" => "http://www.scilab.org/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Scribus",
	        	"editeur" => "The Scribus Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL",
	        	"siteWeb" => "http://scribus.net/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Sql Server Management Studio",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://msdn.microsoft.com/library/mt238290.aspx"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Sublime Text",
	        	"editeur" => "Jon Skinner",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire, nagware",
	        	"siteWeb" => "http://www.sublimetext.com/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Talend Open Studio",
	        	"editeur" => "Talend",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Apache 2.0",
	        	"siteWeb" => "https://www.talend.com/download/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "TortoiseSVN",
	        	"editeur" => "TortoiseSVN Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU/GPL",
	        	"siteWeb" => "https://tortoisesvn.net/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "VLC",
	        	"editeur" => "VideoLAN Team",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "LGPL",
	        	"siteWeb" => "https://videolan.org/vlc/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Visionneuse Power Point",
	        	"editeur" => "Microsoft",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "https://www.microsoft.com/fr-fr/download/details.aspx?id=13"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "VirTeasy Dental",
	        	"editeur" => "HRV",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "Propriétaire",
	        	"siteWeb" => "http://www.hrv-simulation.com/en/virteasy-dental.html"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Wamp server /  Xampp portable / Uwamp portable",
	        	"editeur" => "Romain Bourdon",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU GPL",
	        	"siteWeb" => "http://www.wampserver.com/"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "WinDesign",
	        	"editeur" => "Cecima",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "LGPL",
	        	"siteWeb" => "http://www.win-design.com/fr"
	        ]);

	        Logiciel::create([
	        	"nom_logiciel" => "Wireshark",
	        	"editeur" => "Projet Wireshark",
	        	"type_logiciel" => "Logiciel",
	        	"licence" => "GNU GPL",
	        	"siteWeb" => "https://www.wireshark.org/"
	        ]);
	    }
    }
?>