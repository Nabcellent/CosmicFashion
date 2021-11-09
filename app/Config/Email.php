<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    /**
     * @var string
     */
    public string $fromEmail = 'nabcellent.dev@gmail.com';

    /**
     * @var string
     */
    public string $fromName = "CosmicFashion.";

    /**
     * @var string
     */
    public string $recipients;

    /**
     * The "user agent"
     *
     * @var string
     */
    public string $userAgent = 'CosmicFashion.';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     *
     * @var string
     */
    public string $protocol = 'smtp';

    /**
     * The server path to Sendmail.
     *
     * @var string
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Server Address
     *
     * @var string
     */
    public string $SMTPHost = 'smtp.gmail.com';

    /**
     * SMTP Username
     *
     * @var string
     */
    public string $SMTPUser = "su.fashion10@gmail.com";

    /**
     * SMTP Password
     *
     * @var string
     */
    public string $SMTPPass = "bvdcrrquknirwayl";

    /**
     * SMTP Port
     *
     * @var int
     */
    public int $SMTPPort = 465;

    /**
     * SMTP Timeout (in seconds)
     *
     * @var int
     */
    public int $SMTPTimeout = 60;

    /**
     * Enable persistent SMTP connections
     *
     * @var bool
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption. Either tls or ssl
     *
     * @var string
     */
    public string $SMTPCrypto = 'tls';

    /**
     * Enable word-wrap
     *
     * @var bool
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     *
     * @var int
     */
    public $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     *
     * @var string
     */
    public string $mailType = 'html';

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     *
     * @var string
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     *
     * @var bool
     */
    public bool $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     *
     * @var int
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     *
     * @var string
     */
    public $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     *
     * @var string
     */
    public $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     *
     * @var bool
     */
    public $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     *
     * @var int
     */
    public $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     *
     * @var bool
     */
    public $DSN = false;
}
