<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Ssd;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ssd controller.
 *
 * @Route("ssd")
 */
class SsdController extends Controller
{
    /**
     * Lists all ssd entities.
     *
     * @Route("/", name="ssd_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ssds = $em->getRepository('ManagerITBundle:Ssd')->findAll();

        return $this->render('ssd/index.html.twig', array(
            'ssds' => $ssds,
        ));
    }

    /**
     * Creates a new ssd entity.
     *
     * @Route("/new/{computer}", name="ssd_new", defaults={"computer" = null})
     * @Method({"GET", "POST"})
     */
    public function newAction($computer, Request $request)
    {
        $ssd = new Ssd();
        $form = $this->createForm('ManagerITBundle\Form\SsdType', $ssd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ssd);
            $em->flush($ssd);

            if ($computer != null) {
                $computerToReturn = $em->getRepository('ManagerITBundle:Computer')->findOneById($computer);
                if ($computerToReturn) {
                    $type = $computerToReturn->getFormFactor();
                    return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer));
                }
            }

            return $this->redirectToRoute('ssd_show', array('id' => $ssd->getId()));

        }

        return $this->render('ssd/new.html.twig', array(
            'ssd' => $ssd,
            'form' => $form->createView(),
            'computer' => $computer,
        ));
    }

    /**
     * Finds and displays a ssd entity.
     *
     * @Route("/{id}", name="ssd_show")
     * @Method("GET")
     */
    public function showAction(Ssd $ssd)
    {
        $deleteForm = $this->createDeleteForm($ssd);

        return $this->render('ssd/show.html.twig', array(
            'ssd' => $ssd,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ssd entity.
     *
     * @Route("/{id}/edit", name="ssd_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ssd $ssd)
    {
        $deleteForm = $this->createDeleteForm($ssd);
        $editForm = $this->createForm('ManagerITBundle\Form\SsdType', $ssd);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ssd_show', array('id' => $ssd->getId()));
        }

        return $this->render('ssd/edit.html.twig', array(
            'ssd' => $ssd,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ssd entity.
     *
     * @Route("/{id}", name="ssd_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ssd $ssd)
    {
        $form = $this->createDeleteForm($ssd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ssd);
            $em->flush($ssd);
        }

        return $this->redirectToRoute('ssd_index');
    }

    /**
     * Creates a form to delete a ssd entity.
     *
     * @param Ssd $ssd The ssd entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ssd $ssd)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ssd_delete', array('id' => $ssd->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
