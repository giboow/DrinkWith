<?php
namespace DrinkWith\Bundle\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

/**
 * Picweek\Bundle\UserBundle\Form\Type\RegistrationFormType
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class ProfileFormType extends BaseType
{


    /**
     * Build form
     * @param FormBuilder   $builder
     * @param array         $options
     *
     * @see FOS\UserBundle\Form\Type.RegistrationFormType::buildForm()
     *
     * @return void
     */
    public function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildUserForm($builder, $options);

        //$builder->add('location', null, array('required' => false));
    }

    /**
     * Get name
     * @see FOS\UserBundle\Form\Type.RegistrationFormType::getName()
     *
     * @return string
     */
    public function getName()
    {
        return 'drinkwith_user_profile';
    }
}
