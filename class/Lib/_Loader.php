<?php
	$CoreLibs = array
	(
		'Std',
		'Json'
		'FileManager',
		'Config',
		'Lang',
		'Data',

		'Regex',

		'vCardParser'
	);

	LoadCoreLibs($CoreLibs);
	
	#############
	# Functions #
	#############

	function LoadCoreLibs($Libs)
	{
		foreach($Libs as $Lib)
			require_once dirname(__FILE__) . "/{$Lib}.php";
	}

	function LoadLibs()
	{
		Std::Out();
		Std::Out('[Info] [Libs] Loading');

		$Libs = Config::Get('Libs');

		if(is_array($Libs))
		{
			foreach($Libs as $Lib)
				LoadLib($Lib);

			Std::Out('[Info] [Libs] Ready!');
		}
		else
			Std::Out('[Warning] [Libs] Config file is not an array');
	}

	function LoadLib($Lib)
	{
		$Path = dirname(__FILE__) . "/_{$Lib}.php";

		if(basename(dirname(realpath($Path))) === 'Lib')
		{
			if(is_readable($Path))
			{
				// Lint

				require_once $Path;

				return true;
			}
			else
				Std::Out("[Warning] [Libs] Can't load {$Lib}. It is not readable");
		}
		else
			Std::Out("[Warning] [Libs] Can't load {$Lib}. It is not in Lib/ folder");

		return false;
	}