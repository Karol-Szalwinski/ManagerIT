<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\PowerSupply;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Powersupply controller.
 *
 * @Route("powersupply")
 */
class PowerSupplyController extends Controller
{
    /**
     * Lists all powerSupply entities.
     *
     * @Route("/", name="powersupply_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $powerSupplies = $em->getRepository('ManagerITBundle:PowerSupply')->findAll();

        return $this->render('powersupply/index.html.twig', array(
            'powerSupplies' => $powerSupplies,
        ));
    }

    /**
     * Creates a new powerSupply entity.
     *
     * @Route("/new/{computer}", name="powersupply_new", defaults={"computer" = null})
     * @Method({"GET", "POST"})
     */
    public function newAction($computer, Request $request)
    {
        $powerSupply = new Powersupply();
        $form = $this->createForm('ManagerITBundle\Form\PowerSupplyType', $powerSupply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($powerSupply);
            $em->flush($powerSupply);

            if ($computer != null) {
                $computerToReturn = $em->getRepository('ManagerITBundle:Computer')->findOneById($computer);
                if ($computerToReturn) {
                    $type = $computerToReturn->getFormFactor();
                    return $this->redirectToRoute('computer_components', array('type' => $type, 'id' => $computer));
                }
            }

            return $this->redirectToRoute('powersupply_show', array('id' => $powerSupply->getId()));
        }

        return $this->render('powersupply/new.html.twig', array(
            'powerSupply' => $powerSupply,
            'form' => $form->createView(),
            'computer' => $computer,
        ));
    }

    /**
     * Finds and displays a powerSupply entity.
     *
     * @Route("/{id}", name="powersupply_show")
     * @Method("GET")
     */
    public function showAction(PowerSupply $powerSupply)
    {
        $deleteForm = $this->createDeleteForm($powerSupply);

        return $this->render('powersupply/show.html.twig', array(
            'powerSupply' => $powerSupply,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing powerSupply entity.
     *
     * @Route("/{id}/edit", name="powersupply_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PowerSupply $powerSupply)
    {
        $deleteForm = $this->createDeleteForm($powerSupply);
        $editForm = $this->createForm('ManagerITBundle\Form\PowerSupplyType', $powerSupply);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('powersupply_show', array('id' => $powerSupply->getId()));
        }

        return $this->render('powersupply/edit.html.twig', array(
            'powerSupply' => $powerSupply,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a powerSupply entity.
     *
     * @Route("/{id}", name="powersupply_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PowerSupply $powerSupply)
    {
        $form = $this->createDeleteForm($powerSupply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($powerSupply);
            $em->flush($powerSupply);
        }

        return $this->redirectToRoute('powersupply_index');
    }

    /**
     * Creates a form to delete a powerSupply entity.
     *
     * @param PowerSupply $powerSupply The powerSupply entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PowerSupply $powerSupply)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('powersupply_delete', array('id' => $powerSupply->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
