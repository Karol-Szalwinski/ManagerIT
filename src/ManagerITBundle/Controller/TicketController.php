<?php

namespace ManagerITBundle\Controller;

use ManagerITBundle\Entity\Ticket;
use ManagerITBundle\Entity\Category;
use ManagerITBundle\Entity\User;
use ManagerITBundle\Entity\Activity;

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

        $ticketsHigh = $em->getRepository('ManagerITBundle:Ticket')->findByPriority(0);
        $ticketsMed = $em->getRepository('ManagerITBundle:Ticket')->findByPriority(1);
        $ticketsLow = $em->getRepository('ManagerITBundle:Ticket')->findByPriority(2);

        return $this->render('ticket/index.html.twig', array(
            'tickets_high' => $ticketsHigh,
            'tickets_med' => $ticketsMed,
            'tickets_low' => $ticketsLow,
        ));
    }

    /**
     * Lists all ticket entities.
     *
     * @Route("/newest", name="ticket_index_new")
     * @Method("GET")
     */
    public function indexNewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ticketsHigh = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 1, 'priority' => 0]);
        $ticketsMed = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 1, 'priority' => 1]);
        $ticketsLow = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 1, 'priority' => 2]);

        return $this->render('ticket/index.html.twig', array(
            'tickets_high' => $ticketsHigh,
            'tickets_med' => $ticketsMed,
            'tickets_low' => $ticketsLow,
        ));
    }

    /**
     * Lists all ticket entities.
     *
     * @Route("/open", name="ticket_index_open")
     * @Method("GET")
     */
    public function indexOpenAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ticketsHigh = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 2, 'priority' => 0]);
        $ticketsMed = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 2, 'priority' => 1]);
        $ticketsLow = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 2, 'priority' => 2]);

        return $this->render('ticket/index.html.twig', array(
            'tickets_high' => $ticketsHigh,
            'tickets_med' => $ticketsMed,
            'tickets_low' => $ticketsLow,
        ));
    }

    /**
     * Lists all ticket entities.
     *
     * @Route("/suspend", name="ticket_index_suspend")
     * @Method("GET")
     */
    public function indexSuspendAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ticketsHigh = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 3, 'priority' => 0]);
        $ticketsMed = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 3, 'priority' => 1]);
        $ticketsLow = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 3, 'priority' => 2]);

        return $this->render('ticket/index.html.twig', array(
            'tickets_high' => $ticketsHigh,
            'tickets_med' => $ticketsMed,
            'tickets_low' => $ticketsLow,
        ));
    }

    /**
     * Lists all ticket entities.
     *
     * @Route("/closed", name="ticket_index_closed")
     * @Method("GET")
     */
    public function indexClosedAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ticketsHigh = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 4, 'priority' => 0]);
        $ticketsMed = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 4, 'priority' => 1]);
        $ticketsLow = $em->getRepository('ManagerITBundle:Ticket')->findBy(['status' => 4, 'priority' => 2]);

        return $this->render('ticket/index.html.twig', array(
            'tickets_high' => $ticketsHigh,
            'tickets_med' => $ticketsMed,
            'tickets_low' => $ticketsLow,
        ));
    }

    /**
     * Lists all ticket entities.
     *
     * @Route("/mine", name="ticket_index_mine")
     * @Method("GET")
     */
    public function indexMyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $loggedUserId = $this->getUser()->getId();
//        $tickets = $em->getRepository('ManagerITBundle:Ticket')->findByRequester($loggedUserId);
        $ticketsHigh = $em->getRepository('ManagerITBundle:Ticket')->findBy(['requester' => $loggedUserId, 'priority'=> 0]);
        $ticketsMed = $em->getRepository('ManagerITBundle:Ticket')->findBy(['requester' => $loggedUserId, 'priority'=> 1]);
        $ticketsLow = $em->getRepository('ManagerITBundle:Ticket')->findBy(['requester' => $loggedUserId, 'priority'=> 2]);

        return $this->render('ticket/index.html.twig', array(
            'tickets_high' => $ticketsHigh,
            'tickets_med' => $ticketsMed,
            'tickets_low' => $ticketsLow,
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
            $categories = $em->getRepository('ManagerITBundle:Category')->findByParent(null);
        } //
        else {
            $category = $em->getRepository('ManagerITBundle:Category')->findOneById($id);
            $categories = $em->getRepository('ManagerITBundle:Category')->findByParent($category);

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
        $ticket->setRequester($this->getUser());
        $form = $this->createForm('ManagerITBundle\Form\TicketType', $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->getUser()->hasRole('ROLE_ADMIN')) {
                $ticket->setRequester($this->getUser());
            }
            $em = $this->getDoctrine()->getManager();
            $newStatus = $em->getRepository('ManagerITBundle:Status')->findOneById(1);
            $ticket->setStatus($newStatus);
            $ticket->setCategory($category);
            $ticket->setPriority($ticket->getCategory()->getPriority());
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
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request, Ticket $ticket)
    {

        $deleteForm = $this->createDeleteForm($ticket);
        $activity = new Activity();
        $activity->setStatus($ticket->getStatus());

        $form = $this->createForm('ManagerITBundle\Form\ActivityType', $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && !empty($ticket->getActivities())) {
            $em = $this->getDoctrine()->getManager();

            $ticket->addActivity($activity);
            $ticket->setStatus($activity->getStatus());
//            $ticket->addAssignedTechnican($user);

            $activity->setTicket($ticket);
            $activity->setUser($this->getUser());

            $em->persist($activity);
            $em->flush();

            return $this->redirectToRoute('ticket_show', array('id' => $ticket->getId()));
        }

        return $this->render('ticket/show.html.twig', array(
            'ticket' => $ticket,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView()
        ));

    }

    /**
     * Ticket set first activity.
     *
     * @Route("/{id}/first", name="ticket_first_activity")
     * @Method({"GET"})
     */
    public function firstActivityAction(Request $request, Ticket $ticket)
    {

        if ($ticket->getActivities()->isEmpty()) {

            $activity = new Activity();

            $em = $this->getDoctrine()->getManager();
            $statusWorking = $em->getRepository('ManagerITBundle:Status')->findOneById(2);
            $user = $em->getRepository('ManagerITBundle:User')->findOneById($this->getUser()->getId());
            $ticket->addActivity($activity);

            if (!$ticket->hasAssignedTechnican($user)) {

                $ticket->addAssignedTechnican($user);
                $user->addTicketsToDo($ticket);

            };

            $ticket->setStatus($statusWorking);


            $activity->setTicket($ticket);
            $activity->setUser($this->getUser());
            $activity->setStatus($statusWorking);
            $activity->setMessage('Zgłoszenie zostało przyjęte');

            $em->persist($activity);
            $em->flush();


        }

        return $this->redirectToRoute('ticket_show', array('id' => $ticket->getId()));
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
            ->getForm();
    }

    /**
     * Action to connect ticket to user
     *
     * @Route("/{ticket}/connecttechnican/{user}", name="ticket_connect_technican")
     * @Method("GET")
     */
    public
    function ticketConnectTechnicanAction(Ticket $ticket, User $user)

    {
        $em = $this->getDoctrine()->getManager();
        if (!$ticket->hasAssignedTechnican($user)) {

            $ticket->addAssignedTechnican($user);
            $user->addTicketsToDo($ticket);

            $em->flush();
        };


        return $this->redirectToRoute('ticket_show', array('id' => $ticket->getId()));
    }
//
//    /**
//     * Ticket disconnect User
//     * @Route("/{ticket}/removeuser/{user}", name="ticket_remove_user")
//     * @Method("GET")
//     */
//    public
//    function ticketRemoveUserAction(Ticket $ticket, User $user)
//    {
//
//        $ticket->removeAssignedTechnican($user);
//        $user->removeTicketToDo($ticket);
//        $this->getDoctrine()->getManager()->flush();
//
//        return $this->redirectToRoute('ticket_show', array('id' => $ticket->getId()));
//    }


}
