<?php


namespace HappyR\ApiClient\Tests\Http;

use HappyR\ApiClient\Configuration;
use HappyR\ApiClient\Http\Client;

use Mockery as m;

/**
 * Class ConnectionTest
 *
 * Test the connection class
 */
class ConnectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Get a new connection with mocked dependencies
     *
     * @param int $httpStatus
     *
     * @return Client
     */
    protected function getConnection($httpStatus = 200)
    {
        $conf = new Configuration();

        $request = m::mock(
            'HappyR\ApiClient\Http\HttpRequestInterface',
            array(
                'setOption' => null,
                'execute' => 'response',
                'getInfo' => $httpStatus,
                'close' => null,
            )
        );
        $request->shouldReceive('createNew')->once()->andReturn(m::self());

        $conn = new Client($conf, $request);

        return $conn;
        //die('Class: '.get_class($conn).' - '.print_r(get_class_methods($conn),true));
    }

    /**
     * Test to send a request
     *
     *
     */
    public function testSendRequest()
    {
        $connection = $this->getConnection();

        $this->assertInstanceOf('HappyR\ApiClient\Http\Response', $connection->sendRequest('url'));
    }

    /**
     * Test error
     *
     * @expectedException HappyR\ApiClient\Exceptions\HttpException
     *
     */
    public function testSendRequestError()
    {
        $connection = $this->getConnection(400);

        $connection->sendRequest('url');
    }
}