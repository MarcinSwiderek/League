<?php

namespace CL\LeagueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CL\LeagueBundle\Entity\League;
use CL\LeagueBundle\Form\LeagueType;

/**
 * League controller.
 *
 */
class LeagueController extends Controller
{
	public function showLeagueAction($id) {
		$em=$this->getDoctrine()->getManager();
		$LeagueEntity=$em->getRepository('CLLeagueBundle:League')->findOneById($id);
		$TeamEntities=$em->getRepository('CLLeagueBundle:Team')->findByLeague($id);
		
		return $this->render('CLLeagueBundle:League:showLeague.html.twig',array(
				'LeagueEntity'=>$LeagueEntity,
				'TeamEntities'=>$TeamEntities
		));
	}
	
	public function listLeaguesAction() 
	{
		$em=$this->getDoctrine()->getManager();
		
		$entities=$em->getRepository('CLLeagueBundle:League')->findAll();
		
		return $this->render('CLLeagueBundle:League:leagueList.html.twig',array(
				'entities' => $entities
		));
	}
	
    /**
     * Lists all League entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CLLeagueBundle:League')->findAll();

        return $this->render('CLLeagueBundle:League:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new League entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new League();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('league_show', array('id' => $entity->getId())));
        }

        return $this->render('CLLeagueBundle:League:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a League entity.
     *
     * @param League $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(League $entity)
    {
        $form = $this->createForm(new LeagueType(), $entity, array(
            'action' => $this->generateUrl('league_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new League entity.
     *
     */
    public function newAction()
    {
        $entity = new League();
        $form   = $this->createCreateForm($entity);

        return $this->render('CLLeagueBundle:League:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a League entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLLeagueBundle:League')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find League entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CLLeagueBundle:League:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing League entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLLeagueBundle:League')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find League entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CLLeagueBundle:League:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a League entity.
    *
    * @param League $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(League $entity)
    {
        $form = $this->createForm(new LeagueType(), $entity, array(
            'action' => $this->generateUrl('league_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing League entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLLeagueBundle:League')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find League entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('league_edit', array('id' => $id)));
        }

        return $this->render('CLLeagueBundle:League:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a League entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CLLeagueBundle:League')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find League entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('league'));
    }

    /**
     * Creates a form to delete a League entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('league_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
