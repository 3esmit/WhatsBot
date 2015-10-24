<?php
	require_once dirname(__FILE__) . '/MediaMessage.php';

	class AudioMessage extends MediaMessage
	{
		public $Duration = null;

		public $Codec = null;

		// Other data => Modify WhatsAPI

		public function __construct($Me, $From, $User, $ID, $Type, $Time, $Name, $URL, $File, $Size, $MIME, $Hash, $Duration, $Codec)
		{
			$this->Duration = (int) $Duration;
			$this->Codec = $Codec;

			parent::__construct($Me, $From, $User, $ID, $Type, $Time, $Name, 'audio', $URL, $File, $Size, $MIME, $Hash);
		}
	}
	