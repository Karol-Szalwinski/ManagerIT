<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Ticket;
use ManagerITBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ticket controller.
 *
 * @Route("ticket")
 */
class TicketController extends Controller
{
    /**
     * Lists all ticket entities.
     *
     * @Route("/", name="ticket_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tickets = $em->getRepository('ManagerITBundle:Ticket')->findAll();

        return $this->render('ticket/index.html.twig', array(
            'tickets' => $tickets,
        ));
    }


    /**
     * Chose category for new ticket.
     *
     * @Route("/category/{id}", name="ticket_category", defaults={"id" = null})
     * @Method("GET")
     */
    public function categoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        if ($id == null) {
            $category = null;
            $categories =  $em->getRepository('ManagerITBundle:Category')->findByParent(null);
        }
//
        else {
            $category = $em->getRepository('ManagerITBundle:Category')->findOneById($id);
            $categories =  $em->getRepository('ManagerITBundle:Category')->findByParent($category);

            if (empty($categories)) {
                return $this->redirectToRoute('ticket_new', array('category' => $id));
            }
        }

        return $this->render('ticket/category.html.twig', array(
            'categories' => $categories,
            'category' => $category,

        ));
    }

    /**
     * Creates a new ticket entity.
     *
     * @Route("/new/{category}", name="ticket_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Category $category)
    {
        $ticket = new Ticket();
        $form = $this->createForm('ManagerITBundle\Form\TicketType', $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $newStatus = $em->getRepository('ManagerITBundle:Status')->findOneById(1);
            $ticket->setStatus($newStatus);
            $ticket->setCategory($category);
            $em->persist($ticket);
            $em->flush($ticket);

            return $this->redirectToRoute('ticket_show', array('id' => $ticket->getId()));
        }

        return $this->render('ticket/new.html.twig', array(
            'ticket' => $ticket,
            'category' => $category,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ticket entity.
     *
     * @Route("/{id}", name="ticket_show")
     * @Method("GET")
     */
    public function showAction(Ticket $ticket)
    {
        $deleteForm = $this->createDeleteForm($ticket);

        return $this->render('ticket/show.html.twig', array(
            'ticket' => $ticket,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ticket entity.
     *
     * @Route("/{id}/edit", name="ticket_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ticket $ticket)
    {
        $deleteForm = $this->createDeleteForm($ticket);
        $editForm = $this->createForm('ManagerITBundle\Form\TicketType', $ticket);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ticket_edit', array('id' => $ticket->getId()));
        }

        return $this->render('ticket/edit.html.twig', array(
            'ticket' => $ticket,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ticket entity.
     *
     * @Route("/{id}", name="ticket_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ticket $ticket)
    {
        $form = $this->createDeleteForm($ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ticket);
            $em->flush($ticket);
        }

        return $this->redirectToRoute('ticket_index');
    }

    /**
     * Creates a form to delete a ticket entity.
     *
     * @param Ticket $ticket The ticket entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ticket $ticket)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticket_delete', array('id' => $ticket->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
