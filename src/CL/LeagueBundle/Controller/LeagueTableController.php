<?php

namespace CL\LeagueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CL\LeagueBundle\Entity\LeagueTable;
use CL\LeagueBundle\Form\LeagueTableType;

/**
 * LeagueTable controller.
 *
 */
class LeagueTableController extends Controller
{

    /**
     * Lists all LeagueTable entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CLLeagueBundle:LeagueTable')->findAll();

        return $this->render('CLLeagueBundle:LeagueTable:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new LeagueTable entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new LeagueTable();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('leaguetable_list_show', array('id' => $entity->getId())));
        }

        return $this->render('CLLeagueBundle:LeagueTable:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a LeagueTable entity.
     *
     * @param LeagueTable $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(LeagueTable $entity)
    {
        $form = $this->createForm(new LeagueTableType(), $entity, array(
            'action' => $this->generateUrl('leaguetable_list_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LeagueTable entity.
     *
     */
    public function newAction()
    {
        $entity = new LeagueTable();
        $form   = $this->createCreateForm($entity);

        return $this->render('CLLeagueBundle:LeagueTable:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LeagueTable entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLLeagueBundle:LeagueTable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LeagueTable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CLLeagueBundle:LeagueTable:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LeagueTable entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLLeagueBundle:LeagueTable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LeagueTable entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CLLeagueBundle:LeagueTable:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a LeagueTable entity.
    *
    * @param LeagueTable $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LeagueTable $entity)
    {
        $form = $this->createForm(new LeagueTableType(), $entity, array(
            'action' => $this->generateUrl('leaguetable_list_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LeagueTable entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLLeagueBundle:LeagueTable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LeagueTable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('leaguetable_list_edit', array('id' => $id)));
        }

        return $this->render('CLLeagueBundle:LeagueTable:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a LeagueTable entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CLLeagueBundle:LeagueTable')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LeagueTable entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('leaguetable_list'));
    }

    /**
     * Creates a form to delete a LeagueTable entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('leaguetable_list_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
