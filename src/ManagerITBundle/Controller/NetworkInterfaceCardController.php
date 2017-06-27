<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\NetworkInterfaceCard;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Networkinterfacecard controller.
 *
 * @Route("networkinterfacecard")
 */
class NetworkInterfaceCardController extends Controller
{
    /**
     * Lists all networkInterfaceCard entities.
     *
     * @Route("/", name="networkinterfacecard_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $networkInterfaceCards = $em->getRepository('ManagerITBundle:NetworkInterfaceCard')->findAll();

        return $this->render('networkinterfacecard/index.html.twig', array(
            'networkInterfaceCards' => $networkInterfaceCards,
        ));
    }

    /**
     * Creates a new networkInterfaceCard entity.
     *
     * @Route("/new", name="networkinterfacecard_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $networkInterfaceCard = new Networkinterfacecard();
        $form = $this->createForm('ManagerITBundle\Form\NetworkInterfaceCardType', $networkInterfaceCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($networkInterfaceCard);
            $em->flush($networkInterfaceCard);

            return $this->redirectToRoute('networkinterfacecard_show', array('id' => $networkInterfaceCard->getId()));
        }

        return $this->render('networkinterfacecard/new.html.twig', array(
            'networkInterfaceCard' => $networkInterfaceCard,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a networkInterfaceCard entity.
     *
     * @Route("/{id}", name="networkinterfacecard_show")
     * @Method("GET")
     */
    public function showAction(NetworkInterfaceCard $networkInterfaceCard)
    {
        $deleteForm = $this->createDeleteForm($networkInterfaceCard);

        return $this->render('networkinterfacecard/show.html.twig', array(
            'networkInterfaceCard' => $networkInterfaceCard,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing networkInterfaceCard entity.
     *
     * @Route("/{id}/edit", name="networkinterfacecard_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NetworkInterfaceCard $networkInterfaceCard)
    {
        $deleteForm = $this->createDeleteForm($networkInterfaceCard);
        $editForm = $this->createForm('ManagerITBundle\Form\NetworkInterfaceCardType', $networkInterfaceCard);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('networkinterfacecard_edit', array('id' => $networkInterfaceCard->getId()));
        }

        return $this->render('networkinterfacecard/edit.html.twig', array(
            'networkInterfaceCard' => $networkInterfaceCard,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a networkInterfaceCard entity.
     *
     * @Route("/{id}", name="networkinterfacecard_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NetworkInterfaceCard $networkInterfaceCard)
    {
        $form = $this->createDeleteForm($networkInterfaceCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($networkInterfaceCard);
            $em->flush($networkInterfaceCard);
        }

        return $this->redirectToRoute('networkinterfacecard_index');
    }

    /**
     * Creates a form to delete a networkInterfaceCard entity.
     *
     * @param NetworkInterfaceCard $networkInterfaceCard The networkInterfaceCard entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NetworkInterfaceCard $networkInterfaceCard)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('networkinterfacecard_delete', array('id' => $networkInterfaceCard->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
