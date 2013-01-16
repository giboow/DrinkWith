<?php

namespace DrinkWith\Bundle\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Bar form
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 */
class BarType extends AbstractType
{
    /**
     * Build form
     * @param FormBuilderInterface 	$builder
     * @param array                 $options
     *
     * @see \Symfony\Component\Form\AbstractType::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('latitude')
            ->add('longitude');
    }

    /**
     * Set Default options
     * @param OptionsResolverInterface $resolver
     *
     * @see \Symfony\Component\Form\AbstractType::setDefaultOptions()
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DrinkWith\Bundle\MainBundle\Entity\Bar'
        ));
    }

    /**
     * Get form name
     *
     * @return string
     * @see \Symfony\Component\Form\FormTypeInterface::getName()
     */
    public function getName()
    {
        return 'drinkwith_bundle_mainbundle_bartype';
    }
}
