<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-23
 * Time: 13:57
 */

declare(strict_types=1);

namespace App\Doc;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\TextResponse;

class MethodNotAllowedHandler implements RequestHandlerInterface
{
    private const MESSAGE
        = <<< 'EOT'
Method Not Allowed

The HTTP method you used to access the resource is either not allowed,
or has not been implemented at this time. Check the Allow header to determine
what methods are allowed when requesting this resource.

EOT;

    /**
     * {@inheritDoc}
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new TextResponse(self::MESSAGE);
    }
}
