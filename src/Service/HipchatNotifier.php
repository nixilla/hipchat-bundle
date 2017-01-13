<?php

namespace Nixilla\HipchatBundle\Service;

use Buzz\Browser;

class HipchatNotifier
{
    /** @var Browser */
    private $client;

    /** @var string */
    private $domain;

    /** @var string */
    private $token;

    /** @var string */
    private $room;

    /**
     * HipchatNotifier constructor.
     * @param Browser $client
     * @param string $domain
     * @param string $token
     * @param string $room
     */
    public function __construct(Browser $client, $domain, $token, $room)
    {
        $this->client = $client;
        $this->domain = $domain;
        $this->token = $token;
        $this->room = $room;
    }

    /**
     * @param string $colour - one of: yellow, green, red, purple, gray, random
     * @param string $message
     * @param string $format - one of: html, text
     * @param bool $notify
     */
    public function notify($colour, $message, $format = 'text', $notify = false)
    {
        $this->client->post(
            sprintf("https://%s/v2/room/%s/notification?auth_token=%s", $this->domain, $this->room, $this->token),
            [ 'Content-Type' => 'application/json' ],
            json_encode([
                'message' => $message,
                'color' => $colour,
                'notify' => $notify,
                'message_format' => $format
            ])
        );
    }
}
