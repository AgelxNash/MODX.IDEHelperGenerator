<?php die("Access denied!");

if (!defined('MODX_BASE_PATH')) define('MODX_BASE_PATH', 'base_path');
if (!defined('MODX_BASE_URL')) define('MODX_BASE_URL', 'base_url');
if (!defined('MODX_SITE_URL')) define('MODX_SITE_URL', 'site_url');
if (!defined('MODX_MANAGER_PATH')) define('MODX_MANAGER_PATH', 'base_path/manager/');
if (!defined('MODX_MANAGER_URL')) define('MODX_MANAGER_URL', 'site_url/manager/');
if (!defined('MODX_API_MODE')) define('MODX_API_MODE', false);
if (!defined('IN_PARSER_MODE')) define('IN_PARSER_MODE', true);
if (!defined('IN_MANAGER_MODE')) define('IN_MANAGER_MODE', false);

$modx = new DocumentParser();

class synccache{
	var $aliases = array();
	var $cachePath = null;
	var $deletedfiles = array();
	var $parents = array();
	var $showReport = null;
	/**
	* build siteCache file
	*
	* @param \DocumentParser $modx
	*
	* @return boolean
	*/
	public function buildCache($modx){}

	public function emptyCache($modx=null){}

	public function escapeDoubleQuotes($s){}

	public function escapeSingleQuotes($s){}

	public function getParents($id, $path=""){}

	public function setCachepath($path){}

	public function setReport($bool){}

}
class PHPMailer{
	/** 
	* Sets the text-only body of the message. This automatically sets the email to multipart/alternative. This body can be read by mail clients that do not have HTML email capability such as mutt. Clients that can read HTML will view the normal Body.
	* @var string
	*/
	var $AltBody = "";
	/** 
	* Sets the Body of the message. This can be either an HTML or text body.
	* @var string
	*/
	var $Body = "";
	/** 
	* Sets the CharSet of the message.
	* @var string
	*/
	var $CharSet = "iso-8859-1";
	/** 
	* Sets the email address that a reading confirmation will be sent.
	* @var string
	*/
	var $ConfirmReadingTo = "";
	/** 
	* Sets the Content-type of the message.
	* @var string
	*/
	var $ContentType = "text/plain";
	/** 
	* Used with DKIM DNS Resource Record optional, in format of email address 'you@yourdomain.com'
	* @var string
	*/
	var $DKIM_domain = "";
	/** 
	* Used with DKIM DNS Resource Record optional, in format of email address 'you@yourdomain.com'
	* @var string
	*/
	var $DKIM_identity = "";
	/** 
	* Used with DKIM DNS Resource Record
	* @var string
	*/
	var $DKIM_passphrase = "";
	/** 
	* Used with DKIM DNS Resource Record optional, in format of email address 'you@yourdomain.com'
	* @var string
	*/
	var $DKIM_private = "";
	/** 
	* Used with DKIM DNS Resource Record
	* @var string
	*/
	var $DKIM_selector = "phpmailer";
	/** 
	* Sets the Encoding of the message. Options for this are "8bit", "7bit", "binary", "base64", and "quoted-printable".
	* @var string
	*/
	var $Encoding = "8bit";
	/** 
	* Holds the most recent mailer error message.
	* @var string
	*/
	var $ErrorInfo = "";
	/** 
	* Sets the From email address for the message.
	* @var string
	*/
	var $From = "root@localhost";
	/** 
	* Sets the From name of the message.
	* @var string
	*/
	var $FromName = "Root User";
	/** 
	* Sets the SMTP HELO of the message (Default is $Hostname).
	* @var string
	*/
	var $Helo = "";
	/** 
	* Sets the SMTP hosts. All hosts must be separated by a semicolon. You can also specify a different port for each host by using this format: [hostname:port] (e.g. "smtp1.example.com:25;smtp2.example.com").
	* @var string
	*/
	var $Host = "localhost";
	/** 
	* Sets the hostname to use in Message-Id and Received headers and as default HELO string. If empty, the value returned by SERVER_NAME is used or 'localhost.localdomain'.
	* @var string
	*/
	var $Hostname = "";
	/** 
	* Provides the ability to change the line ending
	* @var string
	*/
	var $LE = "
";
	/** 
	* Method to send mail: ("mail", "sendmail", or "smtp").
	* @var string
	*/
	var $Mailer = "mail";
	/** 
	* Sets the message ID to be used in the Message-Id header.
	* @var string
	*/
	var $MessageID = "";
	/** 
	* Sets SMTP password.
	* @var string
	*/
	var $Password = "";
	/** 
	* Path to PHPMailer plugins. Useful if the SMTP class is in a different directory than the PHP include path.
	* @var string
	*/
	var $PluginDir = "";
	/** 
	* Sets the default SMTP server port.
	* @var int
	*/
	var $Port = "25";
	/** 
	* Email priority (1 = High, 3 = Normal, 5 = low).
	* @var int
	*/
	var $Priority = "3";
	/** 
	* Sets SMTP authentication. Utilizes the Username and Password variables.
	* @var bool
	*/
	var $SMTPAuth = false;
	/** 
	* Sets SMTP class debugging on or off.
	* @var bool
	*/
	var $SMTPDebug = false;
	/** 
	* Prevents the SMTP connection from being closed after each mail sending. If this is set to true then to close the connection requires an explicit call to SmtpClose().
	* @var bool
	*/
	var $SMTPKeepAlive = false;
	/** 
	* Sets connection prefix.
	* @var string
	*/
	var $SMTPSecure = "";
	/** 
	* Sets the Sender email (Return-Path) of the message. If not empty, will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode.
	* @var string
	*/
	var $Sender = "";
	/** 
	* Sets the path of the sendmail program.
	* @var string
	*/
	var $Sendmail = "/usr/sbin/sendmail";
	/** 
	* Provides the ability to have the TO field process individual emails, instead of sending to entire TO addresses
	* @var bool
	*/
	var $SingleTo = false;
	/** 
	* If SingleTo is true, this provides the array to hold the email addresses
	* @var bool
	*/
	var $SingleToArray = array();
	/** 
	* Sets the Subject of the message.
	* @var string
	*/
	var $Subject = "";
	/** 
	* Sets the SMTP server timeout in seconds.
	* @var int
	*/
	var $Timeout = "10";
	/** 
	* Sets SMTP username.
	* @var string
	*/
	var $Username = "";
	/** 
	* Sets the PHPMailer Version number
	* @var string
	*/
	var $Version = "5.2";
	/** 
	* Sets word wrapping on the body of the message to a given number of characters.
	* @var int
	*/
	var $WordWrap = "0";
	/** 
	* What to use in the X-Mailer header
	* @var string
	*/
	var $XMailer = "";
	/** 
	* Callback Action function name the function that handles the result of the send email action. Parameters: bool $result result of the send action string $to email address of the recipient string $cc cc email addresses string $bcc bcc email addresses string $subject the subject string $body the email body
	* @var string
	*/
	var $action_function = "";
	/**
	* Adds a "To" address.
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function AddAddress($address, $name=""){}

	/**
	* Adds an attachment from a path on the filesystem.
	*
	* @param string $path
	* @param string $name
	* @param string $encoding
	* @param string $type
	*
	* @return bool
	*/
	public function AddAttachment($path, $name="", $encoding="base64", $type="application/octet-stream"){}

	/**
	* Adds a "Bcc" address.
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function AddBCC($address, $name=""){}

	/**
	* Adds a "Cc" address.
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function AddCC($address, $name=""){}

	/**
	* Adds a custom header.
	* @return void
	*/
	public function AddCustomHeader($custom_header){}

	/**
	* Adds an embedded attachment. This can include images, sounds, and just about any other document. Make sure to set the $type to an image type. For JPEG images use "image/jpeg" and for GIF images use "image/gif".
	*
	* @param string $path
	* @param string $cid
	* @param string $name
	* @param string $encoding
	* @param string $type
	*
	* @return bool
	*/
	public function AddEmbeddedImage($path, $cid, $name="", $encoding="base64", $type="application/octet-stream"){}

	/**
	* Adds a "Reply-to" address.
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function AddReplyTo($address, $name=""){}

	/**
	* Adds a string or binary attachment (non-filesystem) to the list.
	*
	* @param string $string
	* @param string $filename
	* @param string $encoding
	* @param string $type
	*
	* @return void
	*/
	public function AddStringAttachment($string, $filename, $encoding="base64", $type="application/octet-stream"){}

	public function AddStringEmbeddedImage($string, $cid, $filename="", $encoding="base64", $type="application/octet-stream"){}

	/**
	* Creates recipient headers.
	* @return string
	*/
	public function AddrAppend($type, $addr){}

	/**
	* Formats an address correctly.
	* @return string
	*/
	public function AddrFormat($addr){}

	public function AlternativeExists(){}

	public function AttachmentExists(){}

	/**
	* Correctly encodes and wraps long multibyte strings for mail headers without breaking lines within a character.
	*
	* @param string $str
	*
	* @return string
	*/
	public function Base64EncodeWrapMB($str){}

	/**
	* Clears all recipients assigned in the TO array. Returns void.
	* @return void
	*/
	public function ClearAddresses(){}

	/**
	* Clears all recipients assigned in the TO, CC and BCC array. Returns void.
	* @return void
	*/
	public function ClearAllRecipients(){}

	/**
	* Clears all previously set filesystem, string, and binary attachments. Returns void.
	* @return void
	*/
	public function ClearAttachments(){}

	/**
	* Clears all recipients assigned in the BCC array. Returns void.
	* @return void
	*/
	public function ClearBCCs(){}

	/**
	* Clears all recipients assigned in the CC array. Returns void.
	* @return void
	*/
	public function ClearCCs(){}

	/**
	* Clears all custom headers. Returns void.
	* @return void
	*/
	public function ClearCustomHeaders(){}

	/**
	* Clears all recipients assigned in the ReplyTo array. Returns void.
	* @return void
	*/
	public function ClearReplyTos(){}

	/**
	* Assembles the message body. Returns an empty string on failure.
	* @return string
	*/
	public function CreateBody(){}

	/**
	* Assembles message header.
	* @return string
	*/
	public function CreateHeader(){}

	/**
	* Create the DKIM header, body, as new header
	*
	* @param string $headers_line
	* @param string $subject
	* @param string $body
	*
	*/
	public function DKIM_Add($headers_line, $subject, $body){}

	/**
	* Generate DKIM Canonicalization Body
	*
	* @param string $body
	*
	*/
	public function DKIM_BodyC($body){}

	/**
	* Generate DKIM Canonicalization Header
	*
	* @param string $s
	*
	*/
	public function DKIM_HeaderC($s){}

	/**
	* Set the private key file and password to sign the message.
	*
	* @param string $key_filename
	* @param string $key_pass
	*
	*/
	public function DKIM_QP($txt, $key_filename, $key_pass){}

	/**
	* Generate DKIM signature
	*
	* @param string $s
	*
	*/
	public function DKIM_Sign($s){}

	/**
	* Encode a header string to best (shortest) of Q, B, quoted or none.
	* @return string
	*/
	public function EncodeHeader($str, $position="text"){}

	/**
	* Encode string to q encoding.
	*
	* @param string $str
	* @param string $position
	*
	* @return string
	*/
	public function EncodeQ($str, $position="text"){}

	/**
	* Encode string to RFC2045 (6.7) quoted-printable format Uses a PHP5 stream filter to do the encoding about 64x faster than the old version Also results in same content as you started with after decoding
	*
	* @param string $string
	* @param integer $line_max
	* @param boolean $space_conv
	*
	* @return string
	*/
	public function EncodeQP($string, $line_max="76", $space_conv=false){}

	/**
	* Encode string to quoted-printable.
	*
	* @param integer $line_max
	* @param string $string
	*
	* @return string
	*/
	public function EncodeQPphp($input="", $line_max="76", $space_conv=false, $string){}

	/**
	* Encodes string to requested format.
	*
	* @param string $str
	* @param string $encoding
	*
	* @return string
	*/
	public function EncodeString($str, $encoding="base64"){}

	/**
	* Changes every end of line from CR or LF to CRLF.
	* @return string
	*/
	public function FixEOL($str){}

	/**
	* Return the current array of attachments
	* @return array
	*/
	public function GetAttachments(){}

	/**
	* Returns the message MIME.
	* @return string
	*/
	public function GetMailMIME(){}

	/**
	* Return the current array of language strings
	* @return array
	*/
	public function GetTranslations(){}

	/**
	* Checks if a string contains multibyte characters.
	*
	* @param string $str
	*
	* @return bool
	*/
	public function HasMultiBytes($str){}

	/**
	* Returns a formatted header line.
	* @return string
	*/
	public function HeaderLine($name, $value){}

	/**
	* Returns true if an inline attachment is present.
	* @return bool
	*/
	public function InlineImageExists(){}

	/**
	* Returns true if an error occurred.
	* @return bool
	*/
	public function IsError(){}

	/**
	* Sets message type to HTML.
	*
	* @param bool $ishtml
	*
	* @return void
	*/
	public function IsHTML($ishtml=true){}

	/**
	* Sets Mailer to send message using PHP mail() function.
	* @return void
	*/
	public function IsMail(){}

	/**
	* Sets Mailer to send message using the qmail MTA.
	* @return void
	*/
	public function IsQmail(){}

	/**
	* Sets Mailer to send message using SMTP.
	* @return void
	*/
	public function IsSMTP(){}

	/**
	* Sets Mailer to send message using the $Sendmail program.
	* @return void
	*/
	public function IsSendmail(){}

	/**
	* Evaluates the message and returns modifications for inline images and backgrounds
	* @return \$message
	*/
	public function MsgHTML($message, $basedir=""){}

	/**
	* Returns the proper RFC 822 formatted date.
	* @return string
	*/
	public function RFCDate(){}

	/**
	* Strips newlines to prevent header injection.
	*
	* @param string $str
	*
	* @return string
	*/
	public function SecureHeader($str){}

	/**
	* Creates message and assigns Mailer. If the message is not sent successfully then it returns false. Use the ErrorInfo variable to view description of the error.
	* @return bool
	*/
	public function Send(){}

	/**
	* Set the From and FromName properties
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function SetFrom($address, $name="", $auto="1"){}

	/**
	* Sets the language for all class error messages.
	*
	* @param string $langcode
	* @param string $lang_path
	*
	*/
	public function SetLanguage($langcode="en", $lang_path="language/"){}

	/**
	* Set the body wrapping.
	* @return void
	*/
	public function SetWordWrap(){}

	/**
	* Set the private key file and password to sign the message.
	*
	* @param string $key_filename
	* @param string $key_pass
	*
	*/
	public function Sign($cert_filename, $key_filename, $key_pass){}

	/**
	* Closes the active SMTP session if one exists.
	* @return void
	*/
	public function SmtpClose(){}

	/**
	* Initiates a connection to an SMTP server.
	* @return bool
	*/
	public function SmtpConnect(){}

	/**
	* Returns a formatted mail line.
	* @return string
	*/
	public function TextLine($value){}

	/**
	* Finds last character boundary prior to maxLength in a utf-8 quoted (printable) encoded string.
	*
	* @param string $encodedText
	* @param int $maxLength
	*
	* @return int
	*/
	public function UTF8CharBoundary($encodedText, $maxLength){}

	/**
	* Check that a string looks roughly like an email address should Static so it can be used without instantiation Tries to use PHP built-in validator in the filter extension (from PHP 5.2), falls back to a reasonably competent regex validator Conforms approximately to RFC2822
	*
	* @param string $address
	*
	* @return boolean
	*/
	public function ValidateAddress($address){}

	/**
	* Wraps message for use with mailers that do not automatically perform wrapping and for quoted-printable.
	*
	* @param string $message
	* @param integer $length
	* @param boolean $qp_mode
	*
	* @return string
	*/
	public function WrapText($message, $length, $qp_mode=false){}

	/**
	* Gets the MIME type of the embedded or inline image
	* @return string
	*/
	public function _mime_types($ext=""){}

	/**
	* Set (or reset) Class Objects (variables)
	*
	* @param string $name
	* @param mixed $value
	*
	*/
	public function set($name, $value=""){}

}
class POP3{
	/** 
	* POP3 Carriage Return + Line Feed
	* @var string
	*/
	var $CRLF = "
";
	/** 
	* Default POP3 port
	* @var int
	*/
	var $POP3_PORT = "110";
	/** 
	* Default Timeout
	* @var int
	*/
	var $POP3_TIMEOUT = "30";
	/** 
	* Sets the POP3 PHPMailer Version number
	* @var string
	*/
	var $Version = "5.2";
	/** 
	* Displaying Debug warnings? (0 = now, 1+ = yes)
	* @var int
	*/
	var $do_debug = "2";
	/** 
	* POP3 Mail Server
	* @var string
	*/
	var $host = null;
	/** 
	* POP3 Password
	* @var string
	*/
	var $password = null;
	/** 
	* POP3 Port
	* @var int
	*/
	var $port = null;
	/** 
	* POP3 Timeout Value
	* @var int
	*/
	var $tval = null;
	/** 
	* POP3 Username
	* @var string
	*/
	var $username = null;
	/**
	* Combination of public events - connect, login, disconnect
	*
	* @param string $host
	* @param integer $port
	* @param integer $tval
	* @param string $username
	* @param string $password
	*
	*/
	public function Authorise($host, $port, $tval, $username, $password, $debug_level="0"){}

	/**
	* Connect to the POP3 server
	*
	* @param string $host
	* @param integer $port
	* @param integer $tval
	*
	* @return boolean
	*/
	public function Connect($host, $port=false, $tval="30"){}

	/**
	* Disconnect from the POP3 server
	*/
	public function Disconnect(){}

	/**
	* Login to the POP3 server (does not support APOP yet)
	*
	* @param string $username
	* @param string $password
	*
	* @return boolean
	*/
	public function Login($username="", $password=""){}

}
class SMTP{
	/** 
	* SMTP reply line ending
	*/
	var $CRLF = "
";
	/** 
	* SMTP server port
	*/
	var $SMTP_PORT = "25";
	/** 
	* Sets the SMTP PHPMailer Version number
	* @var string
	*/
	var $Version = "5.2";
	/** 
	* Sets whether debugging is turned on
	*/
	var $do_debug = null;
	/** 
	* Sets VERP use on/off (default is off)
	*/
	var $do_verp = false;
	/**
	* Performs SMTP authentication. Must be run after running the Hello() method. Returns true if successfully authenticated.
	* @return bool
	*/
	public function Authenticate($username, $password){}

	/**
	* Closes the socket and cleans up the state of the class.
	* @return void
	*/
	public function Close(){}

	/**
	* Connect to the server specified on the port specified.
	* @return bool
	*/
	public function Connect($host, $port="0", $tval="30"){}

	/**
	* Returns true if connected to a server otherwise false
	* @return bool
	*/
	public function Connected(){}

	/**
	* Issues a data command and sends the msg_data to the server finializing the mail transaction. $msg_data is the message that is to be send with the headers. Each header needs to be on a single line followed by a <CRLF> with the message headers and the message body being seperated by and additional <CRLF>.
	* @return bool
	*/
	public function Data($msg_data){}

	/**
	* Sends the HELO command to the smtp server.
	* @return bool
	*/
	public function Hello($host=""){}

	/**
	* Starts a mail transaction from the email address specified in $from. Returns true if successful or false otherwise. If True the mail transaction is started and then one or more Recipient commands may be called followed by a Data command.
	* @return bool
	*/
	public function Mail($from){}

	/**
	* Sends the quit command to the server and then closes the socket if there is no error or the $close_on_error argument is true.
	* @return bool
	*/
	public function Quit($close_on_error=true){}

	/**
	* Sends the command RCPT to the SMTP server with the TO: argument of $to.
	* @return bool
	*/
	public function Recipient($to){}

	/**
	* Sends the RSET command to abort and transaction that is currently in progress. Returns true if successful false otherwise.
	* @return bool
	*/
	public function Reset(){}

	/**
	* Starts a mail transaction from the email address specified in $from. Returns true if successful or false otherwise. If True the mail transaction is started and then one or more Recipient commands may be called followed by a Data command. This command will send the message to the users terminal if they are logged in and send them an email.
	* @return bool
	*/
	public function SendAndMail($from){}

	/**
	* Initiate a TLS communication with the server.
	* @return bool
	*/
	public function StartTLS(){}

	/**
	* This is an optional command for SMTP that this class does not support. This method is here to make the RFC821 Definition complete for this class and __may__ be implimented in the future
	* @return bool
	*/
	public function Turn(){}

	/**
	* Get the current error
	* @return array
	*/
	public function getError(){}

}
class ClipperMailer extends PHPMailer{
}
class ContextMenu{
	public function ContextMenu($id="", $width="120", $visible=false){}

	public function addItem($text, $action="", $img="", $disabled="0"){}

	public function addSeparator(){}

	public function getClientScriptObject(){}

	public function render(){}

}
class DataGrid{
	var $altItemClass = null;
	var $altItemStyle = null;
	var $cellPadding = null;
	var $cellSpacing = null;
	var $colAligns = null;
	var $colColors = null;
	var $colTypes = null;
	var $colWidths = null;
	var $colWraps = null;
	var $columnHeaderClass = null;
	var $columnHeaderStyle = null;
	var $columns = null;
	var $cssClass = null;
	var $cssStyle = null;
	var $ds = null;
	var $fields = null;
	var $footer = null;
	var $header = null;
	var $itemClass = null;
	var $itemStyle = null;
	var $noRecordMsg = "No records found.";
	var $pageNumber = null;
	var $pageSize = null;
	var $pager = null;
	var $pagerLocation = null;
	var $rowAlign = null;
	var $rowIdField = null;
	public function DataGrid($id, $ds, $pageSize="20", $pageNumber="-1"){}

	public function RenderRowFnc($n, $row){}

	public function formatColumnValue($row, $value, $type, $align){}

	public function render(){}

	public function setDataSource($ds){}

}
class DataSetPager{
	var $ds = null;
	var $id = null;
	var $pageClass = null;
	var $pageNumber = null;
	var $pageSize = null;
	var $pageStyle = null;
	var $pager = null;
	var $rows = null;
	var $selPageClass = null;
	var $selPageStyle = null;
	public function DataSetPager($id, $ds, $pageSize="10", $pageNumber="-1"){}

	public function getRenderedPager(){}

	public function getRenderedRows(){}

	public function render(){}

	public function setDataSource($ds){}

	public function setPageSize($ps){}

	public function setRenderPagerFnc($fncName, $args=""){}

	public function setRenderRowFnc($fncName, $args=""){}

}
class SystemEvent{
	var $_output = null;
	var $_propagate = null;
	var $activated = null;
	var $activePlugin = null;
	var $name = null;
	public function _resetEventObject(){}

	/**
	* Display a message to the user
	*
	* @param string $msg
	*
	*/
	public function alert($msg){}

	/**
	* Output
	*
	* @param string $msg
	*
	*/
	public function output($msg){}

	/**
	* Stop event propogation
	*/
	public function stopPropagation(){}

}
abstract class DBAPI_abstract{
	/**
	* Connect to the database.
	* @return void
	*/
	public function connect($host="", $dbase="", $uid="", $pwd="", $persist=false){}

	/**
	* DELETE
	*
	* @param string $from
	* @param string $where
	* @param string $fields
	*
	* @return resource
	*/
	public function delete($from, $where="", $fields=""){}

	/**
	* Disconnect from db.
	*/
	public function disconnect(){}

	/**
	* Escape a string
	*
	* @param string $s
	*
	* @return string
	*/
	public function escape($s){}

	/**
	* Free memory associated with a resultset
	* @return void
	*/
	public function freeResult($rs){}

	/**
	* Get the number of affected rows.
	* @return int
	*/
	public function getAffectedRows(){}

	/**
	* Returns an array of the values found on column $name
	*
	* @param string $name
	* @param mixed $rsq
	*
	* @return array
	*/
	public function getColumn($name, $rsq){}

	/**
	* Returns an array containing the column names in a resultset.
	*
	* @param mixed $rsq
	*
	* @return array
	*/
	public function getColumnNames($rsq){}

	/**
	* Get name of database.
	* @return string
	*/
	public function getDBname(){}

	/**
	*
	* @param string $rsq
	* @param array $params
	*
	*/
	public function getHTMLGrid($rsq, $params){}

	/**
	* Get name of host.
	* @return string
	*/
	public function getHostname(){}

	/**
	* Get the last insert ID
	* @return void
	*/
	public function getInsertId(){}

	/**
	* Get the last error.
	*
	* @param string $type
	*
	* @return string
	*/
	public function getLastError($return_number=false, $type){}

	/**
	* Get the number of rows in a resultset. Return 0 if resultset invalid.
	*
	* @param resource $rs
	*
	* @return int
	*/
	public function getRecordCount($rs){}

	/**
	* Return an array of column values
	*
	* @param resource $rs
	* @param string $mode
	*
	* @return array
	*/
	public function getRow($rs, $mode="assoc"){}

	/**
	* Returns an array of structure detail for each column of a
	*
	* @param string $table
	*
	* @return array
	*/
	public function getTableMetaData($table){}

	/**
	* Returns the value from the first column in the set.
	*
	* @param mixed $rsq
	*
	* @return string
	*/
	public function getValue($rsq){}

	/**
	* Returns a string containing the database server version
	* @return string
	*/
	public function getVersion(){}

	/**
	* Returns an XML representation of the dataset $rsq
	* @return string
	*/
	public function getXML($rsq){}

	/**
	* INSERT
	*
	* @param string $fields
	* @param string $intotable
	* @param string $fromfields
	* @param string $fromtable
	* @param string $where
	* @param string $limit
	*
	* @return mixed
	*/
	public function insert($fields, $intotable, $fromfields="*", $fromtable="", $where="", $limit=""){}

	/**
	* INSERT IGNORE
	*
	* @param string $fields
	* @param string $intotable
	* @param string $fromfields
	* @param string $fromtable
	* @param string $where
	* @param string $limit
	*
	* @return mixed
	*/
	public function insert_ignore($fields, $intotable, $fromfields="*", $fromtable="", $where="", $limit=""){}

	/**
	* Is a variable a resultset handle?
	*
	* @param mixed $var
	*
	* @return bool
	*/
	public function is_handle($var){}

	/**
	* Turns a recordset into a multidimensional array
	*
	* @param resource $rs
	*
	* @return mixed
	*/
	public function makeArray($rs){}

	/**
	* Make a persistent connection to the database.
	* @return void
	*/
	public function p_connect(){}

	/**
	* Prepares a date in the proper format for specific database types given a UNIX timestamp
	* @return string
	*/
	public function prepareDate($timestamp, $fieldType="DATETIME"){}

	/**
	* Query the database.
	*
	* @param string $sql
	* @param bool $suppress_errors
	*
	* @return resource
	*/
	public function query($sql, $suppress_errors=false){}

	/**
	* REPLACE
	*
	* @param string $fields
	* @param string $intotable
	* @param string $fromfields
	* @param string $fromtable
	* @param string $where
	* @param string $limit
	*
	* @return mixed
	*/
	public function replace($fields, $intotable, $fromfields="*", $fromtable="", $where="", $limit=""){}

	/**
	* SELECT
	*
	* @param string $fields
	* @param string $from
	* @param string $where
	* @param string $orderby
	* @param string $limit
	*
	* @return resource
	*/
	public function select($fields="*", $from="", $where="", $orderby="", $limit=""){}

	/**
	* Get table engine
	* @return string
	*/
	public function table_engine($table){}

	/**
	* Test for presence of Clipper db tables
	*
	* @param string $prefix
	*
	* @return \bool;
	*/
	public function tables_present($prefix){}

	/**
	* Test database connection or selection
	*/
	public function test_connect($host="", $dbase="", $uid="", $pwd="", $query=""){}

	/**
	* UPDATE
	*
	* @param string $fields
	* @param string $table
	* @param string $where
	*
	* @return resource
	*/
	public function update($fields, $table, $where=""){}

}
class DBAPI extends DBAPI_abstract{
	var $config = null;
	var $conn = null;
	var $isConnected = null;
}
class MakeTable{
	var $actionField = null;
	var $allOption = null;
	var $cellAction = null;
	var $columnHeaderClass = null;
	var $columnWidths = null;
	var $excludeFields = null;
	var $formAction = null;
	var $formElementName = null;
	var $formElementType = null;
	var $formName = null;
	var $linkAction = null;
	var $pageNav = null;
	var $rowAlternateClass = null;
	var $rowAlternatingScheme = null;
	var $rowHeaderClass = null;
	var $rowRegularClass = null;
	var $selectedValues = null;
	var $tableClass = null;
	var $tableID = null;
	var $tableWidth = null;
	var $thClass = null;
	public function MakeTable(){}

	/**
	* Adds an INPUT form element column to the table.
	*/
	public function addFormField($value, $isChecked){}

	/**
	* Generates the table content.
	*/
	public function create($fieldsArray, $fieldHeadersArray=array(), $linkpage=""){}

	/**
	* Generates the cell content, including any specified action fields values.
	*/
	public function createCellText($currentActionFieldValue, $value){}

	/**
	* Creates an individual page link for the paging navigation.
	*/
	public function createPageLink($link, $pageNum, $displayText, $currentPage=false, $qs=""){}

	/**
	* Generates optional paging navigation controls for the table.
	*/
	public function createPagingNavigation($numRecords, $qs=""){}

	/**
	* Determines what class the current row should have applied.
	*/
	public function determineRowClass($position, $value){}

	/**
	* Generates an onclick action applied to the current cell, to execute any specified cell actions.
	*/
	public function getCellAction($currentActionFieldValue, $value){}

	/**
	* Retrieves the width of a specific table column by index position.
	*/
	public function getColumnWidth($columnPosition){}

	/**
	* Generates the proper LIMIT clause for queries to retrieve paged results in a MakeTable $fieldsArray.
	*/
	public function handlePaging(){}

	/**
	* Generates the SORT BY clause for queries used to retrieve a MakeTable $fieldsArray
	*/
	public function handleSorting($natural_order=false){}

	/**
	* Function to prepare a link generated in the table cell/link actions.
	*/
	public function prepareLink($link, $value){}

	/**
	* Generates a link to order by a specific $fieldsArray key; use to generate sort by links in the MakeTable $fieldHeadingsArray values.
	*/
	public function prepareOrderByLink($key, $text, $qs=""){}

	/**
	* Sets the default field value to be used when appending query parameters to link actions.
	*/
	public function setActionFieldName($value){}

	/**
	* Sets an option to generate a check all link when checkbox is indicated as the table formElementType.
	*/
	public function setAllOption(){}

	/**
	* Sets the default link href for all cells in the table.
	*/
	public function setCellAction($value){}

	/**
	* Sets the class attribute of the column header row.
	*/
	public function setColumnHeaderClass($value){}

	/**
	* Sets the width attribute of each column in the array.
	*/
	public function setColumnWidths($widthArray, $value){}

	/**
	* Excludes fields from the table by array key.
	*/
	public function setExcludeFields($value){}

	/**
	* Sets extra content to be presented following the table (but within the form, if a form is being rendered with the table).
	*/
	public function setExtra($value){}

	/**
	* Sets the action of the FORM element.
	*/
	public function setFormAction($value){}

	/**
	* Sets the name of the INPUT form element to be presented as the first column.
	*/
	public function setFormElementName($value){}

	/**
	* Sets the type of INPUT form element to be presented as the first column.
	*/
	public function setFormElementType($value){}

	/**
	* Sets the name of the FORM to wrap the table in when a form element has been indicated.
	*/
	public function setFormName($value){}

	/**
	* Sets the default link href for the text presented in a cell.
	*/
	public function setLinkAction($value){}

	/**
	* Sets the class attribute of alternate table rows.
	*/
	public function setRowAlternateClass($value){}

	/**
	* Sets the table to provide alternate row colors using ODD or EVEN rows
	*/
	public function setRowAlternatingScheme($value){}

	/**
	* Sets the class attribute of the table header row.
	*/
	public function setRowHeaderClass($value){}

	/**
	* Sets the class attribute of regular table rows.
	*/
	public function setRowRegularClass($value){}

	/**
	* An optional array of values that can be preselected when using
	*/
	public function setSelectedValues($valueArray, $value){}

	/**
	* Sets the class attribute of the main HTML TABLE.
	*/
	public function setTableClass($value){}

	/**
	* Sets the id attribute of the main HTML TABLE.
	*/
	public function setTableID($value){}

	/**
	* Sets the width attribute of the main HTML TABLE.
	*/
	public function setTableWidth($value){}

	/**
	* Sets the class attribute of the table header row.
	*/
	public function setThHeaderClass($value){}

}
class ManagerAPI{
	var $action = null;
	public function ManagerAPI(){}

	public function clearSavedFormValues(){}

	public function hasFormValues(){}

	public function initPageViewState($id="0"){}

	public function loadFormValues(){}

	public function saveFormValues($id="0"){}

	public function savePageViewState($id="0"){}

}
class ClipperSqlDumper{
	public function createDump(){}

	public function isDroptables(){}

	public function setDBtables($dbtables){}

	public function setDroptables($state){}

}
class Core{
	var $config = null;
	/** 
	* @var \DBAPI
	*/
	var $db = null;
	var $dumpSQL = false;
	var $executedQueries = "0";
	var $queryCode = "";
	var $queryTime = "0";
	/**
	* Returns the full table name based on db settings
	*
	* @param string $tbl
	*
	* @return string
	*/
	public function getFullTableName($tbl){}

	/**
	* Returns the current micro time
	* @return float
	*/
	public function getMicroTime(){}

	/**
	* Get system settings and user settings
	* @return void
	*/
	public function getSettings(){}

	/**
	* Get user settings
	* @return void
	*/
	public function getUserSettings(){}

	/**
	* Exits with error message
	*
	* @param string $msg
	* @param string $query
	* @param boolean $is_error
	* @param string $nr
	* @param string $file
	* @param string $source
	* @param string $text
	* @param string $line
	*
	* @return void
	*/
	public function messageQuit($msg="unspecified error", $query="", $is_error=true, $nr="", $file="", $source="", $text="", $line=""){}

}
class DbInfo{
	public function output($a, $backup_form){}

}
class DocumentParser extends Core{
	/** 
	* @var \SystemEvent
	*/
	var $Event = null;
	var $aliases = null;
	var $chunkCache = null;
	var $contentTypes = null;
	var $currentSnippet = null;
	var $debug = null;
	var $documentContent = null;
	var $documentGenerated = null;
	var $documentIdentifier = null;
	var $documentListing = null;
	var $documentMap = null;
	var $documentMethod = null;
	var $documentName = null;
	var $documentObject = null;
	var $dumpSnippets = null;
	var $entrypage = null;
	/** 
	* @var \SystemEvent
	*/
	var $event = null;
	var $forwards = "3";
	/** 
	* @var is this an RSS feed request?
	*/
	var $is_rss = false;
	var $jquery_scripts = null;
	var $jscripts = null;
	var $loadedjscripts = null;
	var $maxParserPasses = null;
	var $minParserPasses = null;
	var $placeholders = null;
	var $pluginEvent = null;
	var $result = null;
	var $rs = null;
	var $sjscripts = null;
	var $snippetCache = null;
	/** 
	* @var array Map forked snippet names to names of earlier compatible snippets.
Note that keys are all lowercase.
	*/
	var $snippetMap = array();
	var $snippetObjects = null;
	var $sql = null;
	var $stopOnNotice = null;
	var $table_prefix = null;
	var $templateObject = null;
	var $tstart = null;
	var $virtualDir = null;
	var $visitor = null;
	/**
	* Add an event listner to a plugin - only for use within the current execution cycle
	*
	* @param string $evtName
	* @param string $pluginName
	*
	* @return boolean|int
	*/
	public function addEventListener($evtName, $pluginName){}

	/**
	* Get the number of rows affected in the last db operation
	*
	* @param array $rs
	*
	* @return int
	*/
	public function affectedRows($rs){}

	/**
	* Change current web user's password
	*
	* @param string $o
	* @param string $n
	*
	* @return string|boolean
	*/
	public function changePassword($o, $n){}

	/**
	* Change current web user's password
	*
	* @param string $oldPwd
	* @param string $newPwd
	*
	* @return string|boolean
	*/
	public function changeWebUserPassword($oldPwd, $newPwd){}

	/**
	* Check the cache for a specific document/resource
	*
	* @param int $id
	*
	* @return string
	*/
	public function checkCache($id){}

	/**
	* Checks, if a the result is a preview
	* @return boolean
	*/
	public function checkPreview(){}

	/**
	* Checks the publish state of page
	*/
	public function checkPublishStatus(){}

	/**
	* Check for manager login session
	* @return boolean
	*/
	public function checkSession(){}

	/**
	* check if site is offline
	* @return boolean
	*/
	public function checkSiteStatus(){}

	/**
	* Create a 'clean' document identifier with path information, friendly URL suffix and prefix.
	*
	* @param string $qOrig
	*
	* @return string
	*/
	public function cleanDocumentIdentifier($qOrig){}

	/**
	* Clear the cache of MODX.
	* @return boolean
	*/
	public function clearCache(){}

	/**
	* Close a database connection
	*/
	public function dbClose(){}

	/**
	* Connect to the database
	*/
	public function dbConnect(){}

	/**
	* Query the database
	*
	* @param string $sql
	*
	* @return resource|bool
	*/
	public function dbQuery($sql){}

	/**
	* Run a plugin
	*
	* @param string $pluginCode
	* @param array $params
	*
	*/
	public function evalPlugin($___plugin_code, $___params, $pluginCode, $params){}

	/**
	* Run a snippet
	*
	* @param string $snippet
	* @param array $params
	* @param string $name
	*
	* @return string
	*/
	public function evalSnippet($___snippet_code, $___params, $___name=null, $snippet, $params, $name){}

	/**
	* Run snippets as per the tags in $documentSource and replace the tags with the returned values.
	*
	* @param string $documentSource
	*
	* @return string
	*/
	public function evalSnippets($documentSource){}

	/**
	* Starts the parsing operations.
	*/
	public function executeParser(){}

	/**
	* Check for and log fatal errors
	* @return void
	*/
	public function fatalErrorCheck(){}

	/**
	* Get a result row
	*
	* @param array $rs
	* @param string $mode
	*
	* @return array
	*/
	public function fetchRow($rs, $mode="assoc"){}

	/**
	* Gets all active child documents of the specified document, i.e. those which published and not deleted.
	*
	* @param int $id
	* @param string $sort
	* @param string $dir
	* @param string $fields
	*
	* @return array
	*/
	public function getActiveChildren($id="0", $sort="menuindex", $dir="ASC", $fields="id, pagetitle, description, parent, alias, menutitle"){}

	/**
	* Gets all child documents of the specified document, including those which are unpublished or deleted.
	*
	* @param int $id
	* @param string $sort
	* @param string $dir
	* @param string $fields
	*
	* @return array
	*/
	public function getAllChildren($id="0", $sort="menuindex", $dir="ASC", $fields="id, pagetitle, description, parent, alias, menutitle"){}

	/**
	* Returns the cache relative URL/path with respect to the site root.
	* @return string
	*/
	public function getCachePath(){}

	/**
	* Returns an array of child IDs belonging to the specified parent.
	*
	* @param int $id
	* @param int $depth
	* @param array $children
	*
	* @return array
	*/
	public function getChildIds($id, $depth="10", $children=array()){}

	/**
	* Returns the chunk content for the given chunk name
	*
	* @param string $chunkName
	*
	* @return boolean|string
	*/
	public function getChunk($chunkName){}

	/**
	* Returns an entry from the config
	* @return boolean|string
	*/
	public function getConfig($name=""){}

	/**
	* Returns an array of document groups that current user is assigned to.
	* @return string|array
	*/
	public function getDocGroups(){}

	/**
	* Returns one document/resource
	*
	* @param int $id
	* @param string $fields
	* @param int $published
	* @param int $deleted
	*
	* @return boolean|string
	*/
	public function getDocument($id="0", $fields="*", $published="1", $deleted="0"){}

	/**
	* Returns the children of the selected document/folder.
	*
	* @param int $parentid
	* @param int $published
	* @param int $deleted
	* @param string $fields
	* @param string $where
	* @param \type $sort
	* @param string $dir
	* @param string $limit
	*
	* @return array
	*/
	public function getDocumentChildren($parentid="0", $published="1", $deleted="0", $fields="*", $where="", $sort="menuindex", $dir="ASC", $limit=""){}

	/**
	* Get the TV outputs of a document's children.
	*
	* @param int $parentid
	* @param int $published
	* @param string $docsort
	* @param \ASC $docsortdir
	* @param array $tvidnames
	*
	* @return boolean|array
	*/
	public function getDocumentChildrenTVarOutput($parentid="0", $tvidnames=array(), $published="1", $docsort="menuindex", $docsortdir="ASC", $tvidnames){}

	/**
	* Get the TVs of a document's children. Returns an array where each element represents one child doc.
	*
	* @param int $parentid
	* @param int $published
	* @param string $docsort
	* @param \ASC $docsortdir
	* @param string $tvfields
	* @param string $tvsort
	* @param string $tvsortdir
	* @param array $tvidnames
	*
	* @return boolean|array
	*/
	public function getDocumentChildrenTVars($parentid="0", $tvidnames=array(), $published="1", $docsort="menuindex", $docsortdir="ASC", $tvfields="*", $tvsort="rank", $tvsortdir="ASC", $tvidnames){}

	/**
	* Returns the document identifier of the current request
	*
	* @param string $method
	*
	* @return int
	*/
	public function getDocumentIdentifier($method){}

	/**
	* Get the method by which the current document/resource was requested
	* @return string
	*/
	public function getDocumentMethod(){}

	/**
	* Get all db fields and TVs for a document/resource
	*
	* @param \type $method
	* @param \type $identifier
	*
	* @return array
	*/
	public function getDocumentObject($method, $identifier){}

	/**
	* Returns multiple documents/resources
	*
	* @param array $ids
	* @param int $published
	* @param int $deleted
	* @param string $fields
	* @param string $where
	* @param \type $sort
	* @param string $dir
	* @param string $limit
	*
	* @return array|boolean
	*/
	public function getDocuments($ids=array(), $published="1", $deleted="0", $fields="*", $where="", $sort="menuindex", $dir="ASC", $limit=""){}

	/**
	* Get jquery plugin <script> tag as HTML.
	*
	* @param string $plugin_name
	* @param string $plugin_file
	* @param bool $use_plugin_dir
	*
	*/
	public function getJqueryPluginTag($plugin_name, $plugin_file, $use_plugin_dir=true, $only_once=true){}

	/**
	* Get jquery <script> tag as HTML.
	*
	* @param bool $only_once
	*
	*/
	public function getJqueryTag($only_once=true){}

	/**
	* Returns an array with keywords for the current document, or a document with a given docid
	*
	* @param int $id
	*
	* @return array
	*/
	public function getKeywords($id="0"){}

	/**
	* Returns current user id.
	*
	* @param string $context
	*
	* @return string
	*/
	public function getLoginUserID($context="", $context){}

	/**
	* Returns current user name
	*
	* @param string $context
	*
	* @return string
	*/
	public function getLoginUserName($context="", $context){}

	/**
	* Returns current login user type - web or manager
	* @return string
	*/
	public function getLoginUserType(){}

	/**
	* Returns an array with meta tags for the current document, or a document with a given docid.
	*
	* @param int $id
	*
	* @return array
	*/
	public function getMETATags($id="0"){}

	/**
	* Returns the manager relative URL/path with respect to the site root.
	* @return string
	*/
	public function getManagerPath(){}

	/**
	* Returns the page information as database row, the type of result is defined with the parameter $rowMode
	*
	* @param int $pageid
	* @param int $active
	* @param string $fields
	*
	* @return boolean|array
	*/
	public function getPageInfo($pageid="-1", $active="1", $fields="id, pagetitle, description, alias"){}

	/**
	* Returns the parent document/resource of the given docid
	*
	* @param int $pid
	* @param int $active
	* @param string $fields
	*
	* @return boolean|array
	*/
	public function getParent($pid="-1", $active="1", $fields="id, pagetitle, description, alias, parent"){}

	/**
	* Returns an array of all parent record IDs for the id passed.
	*
	* @param int $id
	* @param int $height
	*
	* @return array
	*/
	public function getParentIds($id, $height="10"){}

	/**
	* Returns the placeholder value
	*
	* @param string $name
	*
	* @return string
	*/
	public function getPlaceholder($name){}

	/**
	* Returns all registered JavaScripts
	* @return string
	*/
	public function getRegisteredClientScripts(){}

	/**
	* Returns all registered startup scripts
	* @return string
	*/
	public function getRegisteredClientStartupScripts(){}

	/**
	* Returns the id of the current snippet.
	* @return int
	*/
	public function getSnippetId(){}

	/**
	* Returns the name of the current snippet.
	* @return string
	*/
	public function getSnippetName(){}

	/**
	* Modified by Raymond for TV - Orig Modified by Apodigm - DocVars Returns a single site_content field or TV record from the db.
	*
	* @param string $idname
	* @param string $fields
	* @param \type $docid
	* @param int $published
	*
	* @return boolean
	*/
	public function getTemplateVar($idname="", $fields="*", $docid="", $published="1"){}

	/**
	* Returns an associative array containing TV rendered output values.
	*
	* @param \type $idnames
	* @param string $docid
	* @param int $published
	* @param string $sep
	*
	* @return boolean|array
	*/
	public function getTemplateVarOutput($idnames=array(), $docid="", $published="1", $sep=""){}

	/**
	* Returns an array of site_content field fields and/or TV records from the db
	*
	* @param array $idnames
	* @param string $fields
	* @param string $docid
	* @param int $published
	* @param string $sort
	* @param string $dir
	*
	* @return boolean|array
	*/
	public function getTemplateVars($idnames=array(), $fields="*", $docid="", $published="1", $sort="rank", $dir="ASC"){}

	/**
	* Returns the ultimate parent of a document
	*
	* @param int $id
	*
	* @return int
	*/
	public function getUltimateParentId($id){}

	/**
	* Get data from phpSniff
	* @return array
	*/
	public function getUserData(){}

	/**
	* Returns an array of document groups that current user is assigned to.
	*
	* @param boolean $resolveIds
	*
	* @return string|array
	*/
	public function getUserDocGroups($resolveIds=false){}

	/**
	* Returns a user info record for the given manager user
	*
	* @param int $uid
	*
	* @return boolean|string
	*/
	public function getUserInfo($uid){}

	/**
	* Returns the ClipperCMS version information as version, branch, release date and full application name.
	* @return array
	*/
	public function getVersionData(){}

	/**
	* Returns a record for the web user
	*
	* @param int $uid
	*
	* @return boolean|string
	*/
	public function getWebUserInfo($uid){}

	/**
	* Returns true if user has the currect permission
	*
	* @param string $pm
	*
	* @return int
	*/
	public function hasPermission($pm){}

	/**
	* Get the ID generated in the last query
	*
	* @param array $rs
	*
	* @return int
	*/
	public function insertId($rs){}

	/**
	* Returns true, install or interact when inside manager.
	* @return string
	*/
	public function insideManager(){}

	/**
	* Invoke an event.
	*
	* @param string $evtName
	* @param array $extParams
	*
	* @return boolean|array
	*/
	public function invokeEvent($evtName, $extParams=array()){}

	/**
	* Returns true if we are currently in the manager/backend
	* @return boolean
	*/
	public function isBackend(){}

	/**
	* Returns true if we are currently in the frontend
	* @return boolean
	*/
	public function isFrontend(){}

	/**
	* Returns true if the current web user is a member the specified groups
	*
	* @param array $groupNames
	*
	* @return boolean
	*/
	public function isMemberOfWebGroup($groupNames=array()){}

	/**
	* Loads an extension from the extenders folder.
	*
	* @param string $extnamegetAllChildren
	*
	* @return boolean
	*/
	public function loadExtension($extname, $extnamegetAllChildren){}

	/**
	* Add an a alert message to the system event log
	*
	* @param int $evtid
	* @param int $type
	* @param string $msg
	* @param string $source
	*
	*/
	public function logEvent($evtid, $type, $msg, $source="Parser"){}

	/**
	* Create a friendly URL
	*
	* @param string $pre
	* @param string $suff
	* @param string $alias
	*
	* @return string
	*/
	public function makeFriendlyURL($pre, $suff, $alias){}

	/**
	* Returns an ordered or unordered HTML list.
	*
	* @param array $array
	* @param string $ulroot
	* @param string $ulprefix
	* @param string $type
	* @param boolean $ordered
	* @param int $tablevel
	*
	* @return string
	*/
	public function makeList($array, $ulroot="root", $ulprefix="sub_", $type="", $ordered=false, $tablevel="0"){}

	/**
	* Create an URL for the given document identifier. The url prefix and postfix are used, when friendly_url is active.
	*
	* @param int $id
	* @param string $alias
	* @param string $args
	* @param string $scheme
	*
	* @return string
	*/
	public function makeUrl($id, $alias="", $args="", $scheme=""){}

	/**
	* Merge chunks
	*
	* @param string $content
	*
	* @return string
	*/
	public function mergeChunkContent($content){}

	/**
	* Merge content fields and TVs
	*
	* @param string $template
	*
	* @return string
	*/
	public function mergeDocumentContent($template){}

	/**
	* Merge meta tags
	*
	* @param string $template
	*
	* @return string
	*/
	public function mergeDocumentMETATags($template){}

	/**
	* Merge placeholder values
	*
	* @param string $content
	*
	* @return string
	*/
	public function mergePlaceholderContent($content){}

	/**
	* Merge system settings
	*
	* @param string $template
	*
	* @return string
	*/
	public function mergeSettingsContent($template){}

	/**
	* Error logging and output.
	*
	* @param string $element_name
	* @param string $msg
	* @param string $query
	* @param boolean $is_error
	* @param string $nr
	* @param string $file
	* @param string $source
	* @param string $text
	* @param string $line
	*
	*/
	public function messageQuitFromElement($element_name, $msg="unspecified error", $query="", $is_error=true, $nr="", $file="", $source="", $text="", $line=""){}

	/**
	* Generate display body for messageQuit()
	*
	* @param string $msg
	* @param string $query
	* @param boolean $is_error
	* @param string $nr
	* @param string $file
	* @param string $source
	* @param string $text
	* @param string $line
	*
	*/
	public function messageQuitText($msg="unspecified error", $query="", $is_error=true, $nr="", $file="", $source="", $text="", $line=""){}

	/**
	* Modifies output
	*
	* @param string $string
	* @param string $modifier
	*
	* @return string
	*/
	public function modifyOutput($string, $modifier){}

	/**
	* Final processing and output of the document/resource.
	*
	* @param boolean $noEvent
	*
	*/
	public function outputContent($noEvent=false){}

	/**
	* Parse a chunk for placeholders
	*
	* @param string $chunkArr
	* @param string $prefix
	* @param string $suffix
	* @param string $chunkname
	*
	* @return string
	*/
	public function parseChunk($chunkName, $chunkArr, $prefix="[+", $suffix="+]", $chunkname){}

	/**
	* Parse a source string.
	*
	* @param string $source
	* @param bool $uncached_snippets
	*
	* @return string
	*/
	public function parseDocumentSource($source, $uncached_snippets=false){}

	/**
	* Parses a resource property string and returns the result as an array
	*
	* @param string $propertyString
	*
	* @return array
	*/
	public function parseProperties($propertyString){}

	/**
	* PHP error handler set by http://www.php.net/manual/en/function.set-error-handler.php
	*
	* @param int $nr
	* @param string $text
	* @param string $file
	* @param string $line
	*
	* @return boolean
	*/
	public function phpError($nr, $text, $file, $line){}

	/**
	* Final jobs.
	*/
	public function postProcess(){}

	/**
	* The next step called at the end of executeParser()
	*/
	public function prepareResponse(){}

	/**
	* Old method that just calls getChunk()
	*
	* @param string $chunkName
	*
	* @return boolean|string
	*/
	public function putChunk($chunkName){}

	/**
	* Count the number of rows in a record set
	* @return int
	*/
	public function recordCount($rs){}

	/**
	* Registers Client-side CSS scripts - these scripts are loaded at inside the <head> tag
	*
	* @param string $src
	* @param string $media
	*
	*/
	public function regClientCSS($src, $media=""){}

	/**
	* Registers Client-side HTML block
	*
	* @param string $html
	*
	*/
	public function regClientHTMLBlock($html){}

	/**
	* Register jQuery core script
	*/
	public function regClientJquery(){}

	/**
	* Register jquery plugin
	*
	* @param string $plugin_name
	* @param string $plugin_file
	* @param string $plugin_version
	* @param bool $use_plugin_dir
	*
	*/
	public function regClientJqueryPlugin($plugin_name, $plugin_file, $plugin_version="0", $use_plugin_dir=true){}

	/**
	* Registers Client-side JavaScript these scripts are loaded at the end of the page unless $startup is true
	*
	* @param string $src
	* @param array $options
	* @param boolean $startup
	*
	* @return string
	*/
	public function regClientScript($src, $options=array(), $startup=false){}

	/**
	* Registers Client-side Startup HTML block
	*
	* @param string $html
	*
	*/
	public function regClientStartupHTMLBlock($html){}

	/**
	* Registers Startup Client-side JavaScript - these scripts are loaded at inside the <head> tag
	*
	* @param string $src
	* @param array $options
	*
	*/
	public function regClientStartupScript($src, $options=array()){}

	/**
	* Set eval type and name Used by the fatal error handler.
	*
	* @param string $type
	* @param string $name
	*
	* @return void
	*/
	public function registerEvalInfo($type, $name){}

	/**
	* Remove all event listners - only for use within the current execution cycle
	*/
	public function removeAllEventListener(){}

	/**
	* Remove event listner - only for use within the current execution cycle
	*
	* @param string $evtName
	*
	* @return boolean
	*/
	public function removeEventListener($evtName){}

	/**
	* Convert URL tags [~.
	*
	* @param string $documentSource
	*
	* @return string
	*/
	public function rewriteUrls($documentSource){}

	/**
	* Executes a snippet.
	*
	* @param string $snippetName
	* @param array $params
	*
	* @return string
	*/
	public function runSnippet($snippetName, $params=array()){}

	/**
	* Sends a message to a user's message box.
	*
	* @param string $type
	* @param string $to
	* @param string $from
	* @param string $subject
	* @param string $msg
	* @param int $private
	*
	*/
	public function sendAlert($type, $to, $from, $subject, $msg, $private="0"){}

	/**
	* Redirect to the error page, by calling sendForward(). This is called for example when the page was not found.
	*/
	public function sendErrorPage(){}

	/**
	* Forward to another page
	*
	* @param int $id
	* @param string $responseCode
	*
	*/
	public function sendForward($id, $responseCode=""){}

	/**
	* Redirect
	*
	* @param string $url
	* @param int $count_attempts
	* @param \type $type
	* @param \type $responseCode
	*
	* @return boolean
	*/
	public function sendRedirect($url, $count_attempts="0", $type="", $responseCode=""){}

	/**
	* Redirect to the unauthorized page, for example on calling a page without having the permissions to see this page.
	*/
	public function sendUnauthorizedPage(){}

	/**
	* Sets a value for a placeholder
	*
	* @param string $name
	* @param string $value
	*
	*/
	public function setPlaceholder($name, $value){}

	/**
	* Set PHP error handlers
	* @return void
	*/
	public function set_error_handler(){}

	/**
	* Format alias to be URL-safe. Strip invalid characters.
	* @return string
	*/
	public function stripAlias($alias){}

	/**
	* Remove unwanted html tags and snippet, settings and tags
	*
	* @param string $html
	* @param string $allowed
	*
	* @return string
	*/
	public function stripTags($html, $allowed=""){}

	/**
	* Returns the timestamp in the date format defined in $this->config['date_format']
	*
	* @param int $timestamp
	* @param string $mode
	*
	* @return string
	*/
	public function toDateFormat($timestamp="0", $mode=""){}

	/**
	* For use by toPlaceholders(); For setting an array or object element as placeholder.
	*
	* @param string $key
	* @param object $value
	* @param string $prefix
	*
	*/
	public function toPlaceholder($key, $value, $prefix=""){}

	/**
	* Set placeholders en masse via an array or object.
	*
	* @param object $subject
	* @param string $prefix
	*
	*/
	public function toPlaceholders($subject, $prefix=""){}

	/**
	* Make a timestamp from a string corresponding to the format in $this->config['date_format']
	*
	* @param string $str
	*
	* @return string
	*/
	public function toTimeStamp($str){}

	/**
	* Unset eval type and name
	* @return void
	*/
	public function unregisterEvalInfo(){}

	/**
	* Returns user login information, as loggedIn (true or false), internal key, username and usertype (web or manager).
	* @return boolean|array
	*/
	public function userLoggedIn(){}

	/**
	* Displays a javascript alert message in the web browser
	*
	* @param string $msg
	* @param string $url
	*
	*/
	public function webAlert($msg, $url=""){}

}
class errorHandler{
	var $errorcode = null;
	var $errors = array(
                    0	=> 	"No errors occured.",
                    1	=>	"An error occured!",
                    2	=>	"Document's ID not passed in request!",
                    3	=>	"You don't have enough privileges for this action!",
                    4	=>	"ID passed in request is NaN!",
                    5	=>	"The document is locked!",
                    6	=>	"Too many results returned from database!",
                    7	=>	"Not enough/ no results returned from database!",
                    8	=>	"Couldn't find parent document's name!",
                    9	=>	"Logging error!",
                    10	=>	"Table to optimise not found in request!",
                    11	=>	"No settings found in request!",
                    12	=>	"The document must have a title!",
                    13	=>	"No user selected as recipient of this message!",
                    14	=>	"No group selected as recipient of this message!",
                    15	=>	"The document was not found!",



                    100 =>	"Double action (GET & POST) posted!",
                    600 =>	"Document cannot be it's own parent!",
                    601 =>	"Document's ID not passed in request!",
                    602 =>	"New parent not set in request!",
                    900 =>	"Incorrect username or password entered!",
                    901 =>	"Incorrect username or password entered!",
                    902 =>	"Due to too many failed logins, you have been blocked!",
                    903 =>	"You are blocked and cannot log in!",
                    904 =>	"You are blocked and cannot log in! Please try again later.",
                    905 =>	"The security code you entered didn't validate! Please try to login again!"
                );
	public function dumpError(){}

	public function getError(){}

	public function setError($errorcode, $custommessage=""){}

}
class HashHandler{
	/**
	* Check password hash
	*
	* @param string $plaintext
	* @param string $hash
	*
	* @return bool
	*/
	public function check($plaintext, $salt, $hash){}

	/**
	* Generate password hash
	*
	* @param string $plaintext
	*
	* @return string
	*/
	public function generate($plaintext){}

}
class logHandler{
	var $entry = array();
	public function initAndWriteLog($msg="", $internalKey="", $username="", $action="", $itemid="", $itemname=""){}

	public function logError($msg){}

	public function writeToLog(){}

}
class Paging{
	var $int_cur_position = null;
	var $int_nbr_row = null;
	var $int_num_result = null;
	var $str_ext_argv = null;
	public function Paging($int_nbr_row, $int_cur_position, $int_num_result, $str_ext_argv=""){}

	public function getCurrentPage(){}

	public function getNumberOfPage(){}

	public function getPagingArray(){}

	public function getPagingRowArray(){}

}
class TemplateRules{
	/**
	* Gets the value of the default teplate. Used when a new document/resource is created
	*/
	public function getDefaultTemplate($tvValueAndLevel){}

	/**
	* Gets list of allowed templates to display
	*/
	public function getTemplateList($tvValueAndLevel){}

	/**
	* Returns an array with the value of the TV and at what level was found. Level is used if multiple levels are configured in the TV
	*/
	public function getTvValueAndLevel($startId, $templateRulesTvID){}

}
class udperms{
	var $document = null;
	var $duplicateDoc = false;
	var $role = null;
	var $user = null;
	public function checkPermissions(){}

}
class Files{
	/**
	* Copy a file from source to destination. If unique == true, then if the destination exists, it will be renamed by appending an increamenting counting number.
	*
	* @param string $source
	* @param string $destination_dir
	* @param string $destination_file
	* @param boolean $unique
	*
	* @return string
	*/
	public function copyFile($source, $destination_dir, $destination_file, $unique=true){}

	/**
	* Create a new folder.
	*
	* @param string $newFolder
	*
	* @return boolean
	*/
	public function createFolder($newFolder, $mode="511"){}

	/**
	* Delete a file.
	*
	* @param string $file
	*
	* @return boolean
	*/
	public function delFile($file){}

	/**
	* Delete folder(s), can delete recursively.
	*
	* @param string $folder
	* @param boolean $recursive
	*
	* @return boolean
	*/
	public function delFolder($folder, $recursive=false){}

	/**
	* Escape the filenames, any non-word characters will be replaced by an underscore.
	*
	* @param string $filename
	*
	* @return string
	*/
	public function escape($filename){}

	/**
	* Append a / to the path if required.
	*
	* @param string $path
	*
	* @return string
	*/
	public function fixPath($path){}

	/**
	* Format the file size, limits to Mb.
	*
	* @param int $size
	*
	* @return string
	*/
	public function formatSize($size){}

	/**
	* Similar to makePath, but the second parameter is not only a path, it may contain say a file ending.
	*
	* @param string $pathA
	* @param string $pathB
	*
	* @return string
	*/
	public function makeFile($pathA, $pathB){}

	/**
	* Concat two paths together. Basically $pathA+$pathB
	*
	* @param string $pathA
	* @param string $pathB
	*
	* @return string
	*/
	public function makePath($pathA, $pathB){}

}
class Image_Transform_Driver_GD extends Image_Transform{
	/** 
	* Holds the image file for manipulation
	*/
	var $imageHandle = "";
	/** 
	* Holds the original image file
	*/
	var $old_image = "";
	/**
	* Check settings
	* @return mixed
	*/
	public function Image_Transform_GD(){}

	/**
	* Rotate image by the given angle Uses a fast rotation algorythm for custom angles or lines copy for multiple of 90 degrees
	*
	* @param int $angle
	* @param array $options
	*
	* @return mixed
	*/
	public function rotate($angle, $options=null){}

}
class Image_Transform_Driver_IM extends Image_Transform{
	/** 
	* associative array commands to be executed
	* @var array
	*/
	var $command = array();
	public function Image_Transform_Driver_IM(){}

	/**
	* rotate
	*/
	public function rotate($angle, $options=null){}

}
class ImageEditor{
	/** 
	* user based on IP address
	*/
	var $_uid = null;
	var $filesaved = "0";
	/** 
	* tmp file storage time.
	*/
	var $lapse_time = "900";
	/** 
	* ImageManager instance.
	*/
	var $manager = null;
	/**
	* Create a new ImageEditor instance. Editing requires a tmp file, which is saved in the current directory where the image is edited. The tmp file is assigned by md5 hash of the user IP address. This hashed is used as an ID for cleaning up the tmp files. In addition, any tmp files older than the the specified period will be deleted.
	*
	* @param \ImageManager $manager
	*
	*/
	public function ImageEditor($manager){}

	/**
	* Delete any tmp image files.
	*
	* @param string $path
	*
	*/
	public function cleanUp($path, $file){}

	/**
	* Create unique tmp image file name.
	*
	* @param string $file
	*
	* @return string
	*/
	public function createUnique($file){}

	/**
	* Get the action GET parameter
	* @return string
	*/
	public function getAction(){}

	/**
	* Get the default save file name, used by editor.php.
	* @return string
	*/
	public function getDefaultSaveFile(){}

	/**
	* Get the image type base on an image file.
	*
	* @param string $file
	*
	* @return string
	*/
	public function getImageType($file){}

	/**
	* Get the file name base on the save name and the save type.
	*
	* @param string $type
	*
	* @return string
	*/
	public function getSaveFileName($type){}

	/**
	* Get a unique filename. If the file exists, the filename base is appended with an increasing integer.
	*
	* @param string $relative
	*
	* @return string
	*/
	public function getUniqueFilename($relative){}

	/**
	* Did we save a file?
	* @return int
	*/
	public function isFileSaved(){}

	/**
	* Check if the specified image can be edit by GD mainly to check that GD can read and save GIFs
	* @return int
	*/
	public function isGDEditable(){}

	/**
	* Check if GIF can be edit by GD.
	* @return int
	*/
	public function isGDGIFAble(){}

	/**
	* Specifiy the original relative path, a new filename and return the new filename with relative path.
	*
	* @param string $pathA
	* @param string $file
	*
	* @return string
	*/
	public function makeRelative($pathA, $file){}

	/**
	* Process the actions, crop, scale(resize), rotate, flip, and save.
	*
	* @param string $relative
	* @param string $fullpath
	*
	* @return array
	*/
	public function processAction($action, $relative, $fullpath){}

	/**
	* Process the image, if not action, just display the image.
	* @return array
	*/
	public function processImage(){}

	/**
	* Generate a unique string based on md5(microtime()).
	* @return string
	*/
	public function uniqueStr(){}

}
class ImageManager{
	/** 
	* Configuration array.
	*/
	var $config = null;
	/** 
	* Array of directory information.
	*/
	var $dirs = null;
	/**
	* Constructor. Create a new Image Manager instance.
	*
	* @param array $config
	*
	*/
	public function ImageManager($config){}

	/**
	* Delete directories recursively.
	*
	* @param string $relative
	*
	* @return boolean
	*/
	public function _delDir($relative){}

	/**
	* Delete the relative file, and any thumbnails.
	*
	* @param string $relative
	*
	* @return boolean
	*/
	public function _delFile($relative){}

	/**
	* Recursively travese the directories to get a list of accessable directories.
	*
	* @param string $base
	* @param string $path
	*
	* @return array
	*/
	public function _dirs($base, $path){}

	/**
	* Process upload files. The file must be an uploaded file. If 'validate_images' is set to true, only images will be processed. Any duplicate file will be renamed. See Files::copyFile for details on renaming.
	*
	* @param string $relative
	* @param array $file
	*
	* @return boolean
	*/
	public function _processFiles($relative, $file){}

	/**
	* Count the number of files and directories in a given folder minus the thumbnail folders and thumbnails.
	*/
	public function countFiles($path){}

	/**
	* Delete and specified directories.
	* @return boolean
	*/
	public function deleteDirs(){}

	/**
	* Delete and specified files.
	* @return boolean
	*/
	public function deleteFiles(){}

	/**
	* Get the base directory.
	* @return string
	*/
	public function getBaseDir(){}

	/**
	* Get the base URL.
	* @return string
	*/
	public function getBaseURL(){}

	/**
	* Get the default thumbnail.
	* @return string
	*/
	public function getDefaultThumb(){}

	/**
	* Get the sub directories in the base dir.
	* @return array
	*/
	public function getDirs(){}

	/**
	* Get the URL of the relative file.
	*
	* @param string $relative
	*
	* @return string
	*/
	public function getFileURL($relative){}

	/**
	* Get all the files and directories of a relative path.
	*
	* @param string $path
	*
	* @return array
	*/
	public function getFiles($path){}

	/**
	* Get the fullpath to a relative file.
	*
	* @param string $relative
	*
	* @return string
	*/
	public function getFullPath($relative){}

	/**
	* Get image size information.
	*
	* @param string $file
	*
	* @return array
	*/
	public function getImageInfo($file){}

	/**
	* For a given image file, get the respective thumbnail filename no file existence check is done.
	*
	* @param string $fullpathfile
	*
	* @return string
	*/
	public function getThumbName($fullpathfile){}

	/**
	* Similar to getThumbName, but returns the URL, base on the given base_url in config.inc.php
	*
	* @param string $relative
	*
	* @return string
	*/
	public function getThumbURL($relative){}

	/**
	* Get the thumbnail url to be displayed.
	*
	* @param string $relative
	*
	* @return string
	*/
	public function getThumbnail($relative){}

	/**
	* Get the tmp file prefix.
	* @return string
	*/
	public function getTmpPrefix(){}

	/**
	* Check if the file contains the thumbnail prefix.
	*
	* @param string $file
	*
	* @return true
	*/
	public function isThumb($file){}

	/**
	* Check if the given directory is a thumbnail directory.
	*
	* @param string $entry
	*
	* @return true
	*/
	public function isThumbDir($entry){}

	/**
	* Check if the given file is a tmp file.
	*
	* @param string $file
	*
	* @return boolean
	*/
	public function isTmpFile($file){}

	public function isValidBase(){}

	/**
	* Create new directories.
	* @return boolean
	*/
	public function processNewDir(){}

	/**
	* Process uploaded files, assumes the file is in $_FILES['upload'] and $_POST['dir'] is set.
	* @return null
	*/
	public function processUploads(){}

	/**
	* Check if the given path is part of the subdirectories under the base_dir.
	*
	* @param string $path
	*
	* @return boolean
	*/
	public function validRelativePath($path){}

}
class Image_Transform_Driver_NetPBM extends Image_Transform{
	/** 
	* associative array commands to be executed
	* @var array
	*/
	var $command = array();
	/**
	* Class Constructor
	*/
	public function Image_Transform_Driver_NetPBM(){}

	public function _postProcess($type, $quality, $save_type){}

	/**
	* Rotates the image
	*
	* @param int $angle
	*
	*/
	public function rotate($angle){}

}
class Thumbnail{
	/** 
	* Graphics driver, GD, NetPBM or ImageMagick.
	*/
	var $driver = null;
	/** 
	* Thumbnail default height.
	*/
	var $height = "96";
	/** 
	* Thumbnail is proportional
	*/
	var $proportional = true;
	/** 
	* Thumbnail default JPEG quality.
	*/
	var $quality = "85";
	/** 
	* Default image type is JPEG.
	*/
	var $type = "jpeg";
	/** 
	* Thumbnail default width.
	*/
	var $width = "96";
	/**
	* Create a new Thumbnail instance.
	*
	* @param int $width
	* @param int $height
	*
	*/
	public function Thumbnail($width="96", $height="96"){}

	/**
	* Create a thumbnail.
	*
	* @param string $file
	* @param string $thumbnail
	*
	* @return boolean
	*/
	public function createThumbnail($file, $thumbnail=null){}

	/**
	* Free up the graphic driver resources.
	*/
	public function free(){}

	/**
	* Save the thumbnail file.
	*
	* @param string $file
	*
	*/
	public function save($file){}

}
class Image_Transform{
	/** 
	* Name of the image file
	* @var string
	*/
	var $image = "";
	/** 
	* Original image width in x direction
	* @var int
	*/
	var $img_x = "";
	/** 
	* Original image width in y direction
	* @var int
	*/
	var $img_y = "";
	var $lapse_time = "900";
	/** 
	* Path the the library used e.g. /usr/local/ImageMagick/bin/ or /usr/local/netpbm/
	*/
	var $lib_path = "";
	/** 
	* New image width in x direction
	* @var int
	*/
	var $new_x = "";
	/** 
	* New image width in y direction
	* @var int
	*/
	var $new_y = "";
	/** 
	* Flag to warn if image has been resized more than once before displaying or saving.
	*/
	var $resized = false;
	/** 
	* Type of the image file (eg. jpg, gif png .
	* @var string
	*/
	var $type = "";
	var $uid = "";
	/**
	* @return void
	*/
	public function _get_image_details($image){}

	/**
	* Parse input and convert If either is 0 it will be scaled proportionally
	*
	* @param mixed $new_size
	* @param int $old_size
	*
	* @return mixed
	*/
	public function _parse_size($new_size, $old_size){}

	/**
	* Place holder for the real resize method used by extended methods to do the resizing
	* @return \PEAR_error
	*/
	public function _resize(){}

	/**
	* Set the image width
	*
	* @param int $size
	*
	*/
	public function _set_img_x($size){}

	/**
	* Set the image height
	*
	* @param int $size
	*
	*/
	public function _set_img_y($size){}

	/**
	* Set the image width
	*
	* @param int $size
	*
	*/
	public function _set_new_x($size){}

	/**
	* Set the image height
	*
	* @param int $size
	*
	*/
	public function _set_new_y($size){}

	public function addBorder(){}

	public function addDropShadow(){}

	public function addText(){}

	public function cleanUp($id, $dir){}

	/**
	* Reverse of rgb2colorname.
	* @return \PEAR_error
	*/
	public function colorarray2colorhex($color){}

	/**
	* Reverse of rgb2colorname.
	* @return \PEAR_error
	*/
	public function colorhex2colorarray($colorhex){}

	public function createUnique($dir){}

	public function crop(){}

	/**
	* Place holder for the real display method used by extended methods to do the resizing
	* @return \PEAR_error
	*/
	public function display($type, $quality){}

	/**
	* Create a new Image_resize object
	*
	* @param string $driver
	*
	* @return mixed
	*/
	public function factory($driver){}

	public function flip(){}

	/**
	* Place holder for the real free method used by extended methods to do the resizing
	* @return \PEAR_error
	*/
	public function free(){}

	public function gamma(){}

	/**
	* Get the type of the image being manipulated
	* @return string
	*/
	public function getImageType(){}

	/**
	* @return string
	*/
	public function getWebSafeFormat(){}

	/**
	* Place holder for the real load method used by extended methods to do the resizing
	* @return \PEAR_error
	*/
	public function load($filename){}

	/**
	* Resize the Image in the X and/or Y direction If either is 0 it will be scaled proportionally
	*
	* @param mixed $new_x
	* @param mixed $new_y
	*
	* @return mixed
	*/
	public function resize($new_x="0", $new_y="0"){}

	/**
	* Place holder for the real save method used by extended methods to do the resizing
	* @return \PEAR_error
	*/
	public function save($filename, $type, $quality){}

	/**
	* Scale Image to a maximum or percentage
	* @return mixed
	*/
	public function scale($size){}

	/**
	* Scales an image to a factor of its original size. For example, if my image was 640x480 and I called scaleByFactor(0.5) then the image would be resized to 320x240.
	*
	* @param float $size
	*
	* @return \none
	*/
	public function scaleByFactor($size){}

	/**
	* Scales an image so that the longest side has this dimension.
	*
	* @param int $size
	*
	* @return \none
	*/
	public function scaleByLength($size){}

	/**
	* Scales an image to a percentage of its original size. For example, if my image was 640x480 and I called scaleByPercentage(10) then the image would be resized to 64x48
	*
	* @param int $size
	*
	* @return \none
	*/
	public function scaleByPercentage($size){}

	/**
	* Scale the image to have the max x dimension specified.
	*
	* @param int $new_x
	*
	* @return \none
	*/
	public function scaleMaxX($new_x){}

	/**
	* Scale the image to have the max y dimension specified.
	*
	* @param int $new_y
	*
	* @return \none
	*/
	public function scaleMaxY($new_y){}

	public function uniqueStr(){}

}
class Snoopy{
	var $_fp_timeout = "30";
	var $_framedepth = "0";
	var $_frameurls = array();
	var $_httpmethod = "GET";
	var $_httpversion = "HTTP/1.0";
	var $_isproxy = false;
	var $_maxlinelen = "4096";
	var $_mime_boundary = "";
	var $_redirectaddr = false;
	var $_redirectdepth = "0";
	var $_submit_method = "POST";
	var $_submit_type = "application/x-www-form-urlencoded";
	var $accept = "image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*";
	var $agent = "Snoopy v1.2.4";
	var $cookies = array();
	var $curl_path = "/usr/local/bin/curl";
	var $error = "";
	var $expandlinks = true;
	var $headers = array();
	var $host = "www.php.net";
	var $lastredirectaddr = "";
	var $maxframes = "0";
	var $maxlength = "500000";
	var $maxredirs = "5";
	var $offsiteok = true;
	var $pass = "";
	var $passcookies = true;
	var $port = "80";
	var $proxy_host = "";
	var $proxy_pass = "";
	var $proxy_port = "";
	var $proxy_user = "";
	var $rawheaders = array();
	var $read_timeout = "0";
	var $referer = "";
	var $response_code = "";
	var $results = "";
	var $status = "0";
	var $temp_dir = "/tmp";
	var $timed_out = false;
	var $user = "";
	public function _check_timeout($fp){}

	public function _connect($fp){}

	public function _disconnect($fp){}

	public function _expandlinks($links, $URI){}

	public function _httprequest($url, $fp, $URI, $http_method, $content_type="", $body=""){}

	public function _httpsrequest($url, $URI, $http_method, $content_type="", $body=""){}

	public function _prepare_post_body($formvars, $formfiles){}

	public function _stripform($document){}

	public function _striplinks($document){}

	public function _striptext($document){}

	public function fetch($URI){}

	public function fetchform($URI){}

	public function fetchlinks($URI){}

	public function fetchtext($URI){}

	public function set_submit_multipart(){}

	public function set_submit_normal(){}

	public function setcookies(){}

	public function submit($URI, $formvars="", $formfiles=""){}

	public function submitlinks($URI, $formvars="", $formfiles=""){}

	public function submittext($URI, $formvars="", $formfiles=""){}

}
class RSSCache{
	var $BASE_CACHE = "./cache";
	var $ERROR = "";
	var $MAX_AGE = "3600";
	public function RSSCache($base="", $age=""){}

	public function cache_age($cache_key){}

	public function check_cache($url){}

	public function debug($debugmsg, $lvl="1024"){}

	public function error($errormsg, $lvl="512"){}

	public function file_name($url){}

	public function get($url){}

	public function serialize($rss){}

	public function set($url, $rss){}

	public function unserialize($data){}

}
class MagpieRSS{
	var $ERROR = "";
	var $WARNING = "";
	var $_CONTENT_CONSTRUCTS = array('content', 'summary', 'info', 'title', 'tagline', 'copyright');
	var $_KNOWN_ENCODINGS = array('UTF-8', 'US-ASCII', 'ISO-8859-1');
	var $_source_encoding = "";
	var $channel = array();
	var $current_item = array();
	var $current_namespace = false;
	var $encoding = "";
	var $feed_type = null;
	var $feed_version = null;
	var $image = array();
	var $inchannel = false;
	var $incontent = false;
	var $inimage = false;
	var $initem = false;
	var $intextinput = false;
	var $items = array();
	var $parser = null;
	var $stack = array();
	var $textinput = array();
	/**
	* Set up XML parser, parse source, and return populated RSS object.
	*
	* @param string $source
	*
	*/
	public function MagpieRSS($source, $output_encoding="ISO-8859-1", $input_encoding=null, $detect_encoding=true){}

	public function append($el, $text){}

	public function append_content($text){}

	public function concat($str1, $str2=""){}

	/**
	* return XML parser, and possibly re-encoded source
	*/
	public function create_parser($source, $out_enc, $in_enc, $detect){}

	public function error($errormsg, $lvl="512"){}

	public function feed_cdata($p, $text){}

	public function feed_end_element($p, $el){}

	public function feed_start_element($p, $element, $attrs){}

	public function is_atom(){}

	public function is_rss(){}

	public function known_encoding($enc){}

	public function normalize(){}

	/**
	* Instaniate an XML parser under PHP4
	*/
	public function php4_create_parser($source, $in_enc, $detect){}

	/**
	* Instantiate an XML parser under PHP5
	*/
	public function php5_create_parser($in_enc, $detect){}

}
