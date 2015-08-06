<?php
namespace Lewis\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Lewis\BlogBundle\Form\Type\RegisterType;
use Lewis\BlogBundle\Entity\Register;

/**
 *  @Route("/blog")
 */
class BlogController extends Controller {
    
    /**
     * @Route("/", name="lewis_blog_index")
     * 
     * @Template
     */
    public function indexAction() {
        return array();
    }

    /**
     * @Route("/site/{nazwa}", 
     *          name="lewis_blog_site", 
     *          defaults={"nazwa"=""}    
     * )
     * 
     * @Method({"GET"})
     */
    public function siteAction($nazwa) {
        $content = $this->renderView('LewisBlogBundle:Blog:site.html.twig', array('nazwa'=>$nazwa));
        return new Response($content);
    }
     /**
     * @Route("/about", name="lewis_blog_about")
     * 
     * @Template
     */
    public function aboutAction() {
        return array();
    }
    /**
     * @Route("/contact", name="lewis_blog_contact")
     * 
     * @Template
     */
    public function contactAction() {
        return array();
    }
    
    /**
     * @Route("/register", 
     *          name="lewis_blog_register"  
     * )
     * 
     * @Template
     */
    public function registerAction(Request $Request) {

        $Register = new Register();
        $Register->setName('Krzysztof Lewandowski')
                 ->setEmail('kontakt@krzysztoflewandowski.pl');

        $Session = $this->get('session');
        if(!$Session->has('registered')) {
        
            $form = $this->createForm(new RegisterType(), $Register);

            $form->handleRequest($Request);



            if($Request->isMethod('post')) {
                if($form->isValid()) {

                    $Session->getFlashBag()->add('success', 'Twój formularz został wysłany');

                    $Session->set('registered', true);

                    return $this->redirect($this->generateUrl('lewis_blog_register'));
                } else {
                    $Session->getFlashBag()->add('danger', 'Wystąpił błąd');
                }
            }
        }
            return array(
                'form' => isset($form) ? $form->createView() : NULL
            );

    }
}
