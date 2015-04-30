<?php

namespace CL\LeagueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LeagueTableType extends AbstractType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CL\LeagueBundle\Entity\LeagueTable'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cl_leaguebundle_leaguetable';
    }
}
