<?php
/**
 * PHP Server Monitor
 * Monitor your servers and websites.
 *
 * This file is part of PHP Server Monitor.
 * PHP Server Monitor is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PHP Server Monitor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PHP Server Monitor.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     phpservermon
 * @author      nerdalertdk
 * @copyright   Copyright (c) 2008-2014 Pepijn Over <pep@neanderthal-technology.com>
 * @license     http://www.gnu.org/licenses/gpl.txt GNU GPL v3
 * @version     Release: @package_version@
 * @link        http://www.phpservermonitor.org/
 * @since       phpservermon 3.1
 **/

namespace psm\Txtmsg;

class Smsit extends Core {
    // =========================================================================
    // [ Fields ]
    // =========================================================================
    public $gateway = 1;
    public $resultcode = null;
    public $resultmessage = null;
    public $success = false;
    public $successcount = 0;

    public function sendSMS($message) {
        // http://www.smsit.dk/api/sendSms.php?apiKey=[KEY]x&senderId=[AFSENDER]&mobile=[MOBILNUMMER]&message=[BESKED]
        // Use USERNAME as API KEY, password not needed
        $textmarketer_url = "http://www.smsit.dk/api/sendSms.php";
        $textmarketer_data = urlencode( $message );
        $textmarketer_origin = urlencode( 'SERVERALERT' );


        foreach( $this->recipients as $phone ){

            $URL = $textmarketer_url."?apiKey=" . $this->username . "&mobile=" . $phone . "&message=" . $textmarketer_data . "&senderId=" . $textmarketer_origin;

            $result = file_get_contents( $URL );

        }

        return $result;
    }

}
