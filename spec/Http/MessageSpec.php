<?php

namespace spec\Alan\Http;

use Alan\Http\Message;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MessageSpec extends ObjectBehavior
{
    function let()
    {
        $protocol = '1.1';
        $headers = [
            'Accept' => ['text/plain'],
            'Accept-Charset' => ['utf-8'],
            'Accept-Encoding' => ['gzip', 'deflate']
        ];
        $this->beConstructedWith($protocol, $headers);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Message::class);
    }

    function it_should_implement_message_interface()
    {
        $this->shouldImplement('Psr\Http\Message\MessageInterface');
    }

    function it_returns_protocol_version()
    {
        $protocol = '1.1';
        $this->getProtocolVersion()->shouldReturn($protocol);
    }
    
    function it_should_provide_a_new_instance_with_specified_version()
    {
        $protocol = '1.1';
        $newProt = '2.0';
        $newMessage = $this->withProtocolVersion($newProt);
        $newMessage->shouldHaveType(Message::class);
        $newMessage->getProtocolVersion()->shouldReturn($newProt);
    }

    function it_should_return_all_headers($headers)
    {
        $headers = [
            'Accept' => ['text/plain'],
            'Accept-Charset' => ['utf-8'],
            'Accept-Encoding' => ['gzip', 'deflate']
        ];
        $this->getHeaders()->shouldbeArray();
        $this->getHeaders()->shouldIterateAs($headers);
    }

    function it_should_return_if_it_has_a_header()
    {
        $this->shouldHaveHeader('Accept');
    }

    function it_should_return_a_specific_header()
    {
        $headers = [
            'Accept' => ['text/plain'],
            'Accept-Charset' => ['utf-8'],
            'Accept-Encoding' => ['gzip', 'deflate']
        ];
        $headerName = 'Accept';
        $expectedValue = 'text/plain';
        $this->getHeader($headerName)->shouldIterateAs($headers[$headerName]);
    }

    function it_should_return_a_specific_plaintext_header()
    {
        $headers = [
            'Accept' => ['text/plain'],
            'Accept-Charset' => ['utf-8'],
            'Accept-Encoding' => ['gzip', 'deflate']
        ];
        $this->getHeaderLine('Accept-Encoding')->shouldReturn('gzip,deflate');
    }

    function it_should_return_a_new_instance_with_replaced_header_value()
    {
        $headers = [
            'Accept' => ['text/plain'],
            'Accept-Charset' => ['utf-8'],
            'Accept-Encoding' => ['gzip', 'deflate']
        ];
        $this->getHeader('Accept')->shouldIterateAs($headers['Accept']);
        $newValue = ['text/orange'];
        $newMessage = $this->withHeader('Accept', $newValue);
        $newMessage->shouldHaveType(Message::class);
        $newMessage->getHeader('Accept')->shouldIterateAs($newValue);
    }

    function it_should_return_a_new_instance_with_extra_specified_header()
    {
        $headers = [
            'Accept' => ['text/plain'],
            'Accept-Charset' => ['utf-8'],
            'Accept-Encoding' => ['gzip', 'deflate']
        ];
        $this->getHeader('Accept')->shouldIterateAs($headers['Accept']);
        $newValue = ['text/orange'];
        $testValue = ['text/plain', 'text/orange'];
        $newMessage = $this->withAddedHeader('Accept', $newValue);
        $newMessage->shouldHaveType(Message::class);
        $newMessage->getHeader('Accept')->shouldIterateAs($testValue);
    }

    function it_should_return_a_new_instance_without_specified_header()
    {
        // throw new \Exception("Test not written Exception");
    }

    function it_should_return_the_body_as_a_stream_interface()
    {
        // throw new \Exception("Test not written Exception");
    }

    function it_should_return_a_new_instance_with_specified_body_stream_interface()
    {
        // throw new \Exception("Test not written Exception");
    }
}
