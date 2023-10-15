<?php
declare(strict_types=1);

namespace SchoolExchange\Core\Auth;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use SchoolExchange\Core\Renderer\TemplateRendererInterface;

class Register
{

    public function __construct(private readonly TemplateRendererInterface $renderer,
    private readonly RegistrationValidator $validator
    ){

    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $post = false;
        if ($request->getMethod() === 'POST'){
            $body = $request->getParsedBody();
            $post = true;
        }
        $username = $body['username']??'';
        $email = $body['email']??'';
        $password = $body['password']??'';
        $password2 = $body['password2']??'';

        if ($this->validator->isValid($username, $email, $password, $password2)){
            //TODO: User anlegen
            return new Response\RedirectResponse('/');
        }

        $error = $this->validator->getErrors($post);

        $body = $this->renderer->render('register', [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'passwordRepeat' => $password2,
            'errors' => $error
        ]);

        $response = new Response;
        $response->getBody()->write($body);
        return $response;
    }
}