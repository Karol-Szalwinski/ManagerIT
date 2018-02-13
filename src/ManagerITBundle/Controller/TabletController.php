<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Tablet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tablet controller.
 *
 * @Route("tablet")
 */
class TabletController extends Controller
{
    /**
     * Lists all tablet entities.
     *
     * @Route("/", name="tablet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tablets = $em->getRepository('ManagerITBundle:Tablet')->findAll();

        return $this->render('tablet/index.html.twig', array(
            'tablets' => $tablets,
        ));
    }

    /**
     * Creates a new tablet entity.
     *
     * @Route("/new", name="tablet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tablet = new Tablet();
        $form = $this->createForm('ManagerITBundle\Form\TabletType', $tablet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tablet);
            $em->flush($tablet);

            return $this->redirectToRoute('tablet_show', array('id' => $tablet->getId()));
        }

        return $this->render('tablet/new.html.twig', array(
            'tablet' => $tablet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tablet entity.
     *
     * @Route("/{id}", name="tablet_show")
     * @Method("GET")
     */
    public function showAction(Tablet $tablet)
    {
        $deleteForm = $this->createDeleteForm($tablet);

        return $this->render('tablet/show.html.twig', array(
            'tablet' => $tablet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tablet entity.
     *
     * @Route("/{id}/edit", name="tablet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tablet $tablet)
    {
        $deleteForm = $this->createDeleteForm($tablet);
        $editForm = $this->createForm('ManagerITBundle\Form\TabletType', $tablet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tablet_edit', array('id' => $tablet->getId()));
        }

        return $this->render('tablet/edit.html.twig', array(
            'tablet' => $tablet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tablet entity.
     *
     * @Route("/{id}", name="tablet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tablet $tablet)
    {
        $form = $this->createDeleteForm($tablet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tablet);
            $em->flush($tablet);
        }

        return $this->redirectToRoute('tablet_index');
    }

    /**
     * Creates a form to delete a tablet entity.
     *
     * @param Tablet $tablet The tablet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tablet $tablet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tablet_delete', array('id' => $tablet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
