<?php

namespace JwtApp\Infrastructure\Delivery\Console\User;

use JwtApp\Domain\Model\User\NotHashedUserPassword;
use JwtApp\Domain\Model\User\UserEmail;
use JwtApp\Domain\Service\User\CreateUserService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends ContainerAwareCommand
{
    private $createUserService;

    public function __construct(CreateUserService $createUserService, ?string $name = null)
    {
        parent::__construct($name);

        $this->createUserService = $createUserService;
    }

    protected function configure()
    {
        $this
            ->setName('jwtapp:user:create')
            ->addArgument('email', InputArgument::REQUIRED, 'Login email')
            ->addArgument('password', InputArgument::REQUIRED, 'Password')
//            ->addOption('ruolo', 'r', InputOption::VALUE_OPTIONAL, 'Ruolo', 'admin')
            ->setDescription('Crea un nuovo utente');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');
//        $ruolo = $input->getOption('ruolo');

//        $user = new User(UserId::create(), new UserEmail($email), new );

        $this->createUserService->execute(
            new UserEmail($email),
            new NotHashedUserPassword($password)
        );
    }
}
