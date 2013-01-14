<?php
namespace DrinkWith\Bundle\UserBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * User type
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 */
class UserType extends AbstractType
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
        ;
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
            'data_class' => 'DrinkWith\Bundle\UserBundle\Entity\User'
        ));
    }

    /**
     * Get name
     *
     * @return string
     * @see \Symfony\Component\Form\FormTypeInterface::getName()
     */
    public function getName()
    {
        return 'drinkwith_bundle_userbundle_usertype';
    }
}
