<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CopyController extends Controller
{
    /**
     * @Route("/copy", name="copy")
     */
    public function index(Request $request)
    {
        $form=$this->createFormBuilder()
            ->add('nume', TextType::class, array('attr'=>array('size'=>'30')))
            ->add('submit', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        $data=[];
        $data['form']=$form->createView();

        if($form->isSubmitted()&&$form->isValid()){

            $var = $form->get('nume')->getData();
            $data['msg']="Goog morning <b>".$var."</b>!";
        }else {
            $data['msg']="Welcome";
        }

        return $this->render('copy/index.html.twig', $data);
    }
}
