<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\FileUploader;
use App\Form\RegistrationFormType;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RegistrationController extends AbstractController
{
    private FileUploader $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $userConnected = $this->getUser();
        if($userConnected != null && $userConnected->getRoles() == ['ROLE_USER']){
            return $this->redirectToRoute('app_affichage_user');
        }else if ($userConnected != null && $userConnected->getRoles() == ['ROLE_ADMIN']){
            return $this->redirectToRoute('admin');
        }
        
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        $photoFile = null;

        if ($form->isSubmitted() && $form->isValid()) {
            // Gérez le téléchargement de la photo
            $photoFile = $form->get('photo')->getData();
            if ($photoFile) {
                $newPhotoFileName = $this->fileUploader->upload($photoFile, 'photo');
                $user->setPhoto($newPhotoFileName);
            }
                
            $user->setRoles(['ROLE_USER']);
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );     

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

                return $userAuthenticator->authenticateUser(
                    $user,
                    $authenticator,
                    $request
                );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
