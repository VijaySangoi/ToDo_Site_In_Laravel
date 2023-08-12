<?php

namespace App\helper;

require '../../vendor/autoload.php';

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Log;

class email
{
    public function dispatch()
    {
        return self::eemail('vijaysangoi29@gmail.com','insert','get a golden tooth');
    }
    static function eemail($email, $subject, $message)
    {
        $client = new SesClient(
            [
                'version' => '2010-12-01',
                'region' => env('AWS_DEFAULT_REGION'),
                'credentials' => [
                    'key' => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY')
                ]
            ]
        );
        $sender_email = env('AWS_EMAIL_HERE');
        $recipient_email = [$email];
        $configuration_set = 'Config';


        $char_set = 'UTF-8';
        try {
            $result = $client->sendEmail(
                [
                    'Destination' => [
                        'ToAddresses' => $recipient_email,
                    ],
                    'ReplyToAddresses' => [$sender_email],
                    'Source' => $sender_email,
                    'Message' =>
                    [
                        'Body' =>
                        [
                            'Html' =>
                            [
                                'charset' => $char_set,
                                'Data' => $message,
                            ],
                            'Text' => [
                                'Charset' => $char_set,
                                'Data' => $subject,
                            ],
                        ],

                        'Subject' => [
                            'Charset' => $char_set,
                            'Data' => $subject,
                        ],
                    ],
                ]

            );
            Log::info('email success');
            return with('success', 'email sent');
        } catch (AwsException $e) {
            $e->getMessage();
            Log::error("error" . $e->getAwsErrorMessage() . '\n');
        }
    }
}
