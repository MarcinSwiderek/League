<?php

namespace CL\LeagueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TeamRegisterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('teamLogoUrl')
            ->add('teamPhotoUrl')
            ->add('league')
	        ->add('players','collection',array(
  	            'type'=>new PlayerType(),		
	            'allow_add'=>true
            		
           ))
//             ->add('players', 'collection', array(
//             		'type' => new PlayerType(),
//             		'allow_add' => true,
// //                         'by_reference' => true,
// //                         'error_bubbling' => false,
//                         'prototype' => true,
            		
//             ))
            ->add('Submit', 'submit')	
        	->getForm()
	        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CL\LeagueBundle\Entity\Team'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cl_leaguebundle_registerteam';
    }
}