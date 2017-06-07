<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.05.17
 * Time: 21:40
 */

namespace GalleryBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Iphp\FileStoreBundle\Form\Type\FileType as IphpFileType;

class PhotoAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        return $listMapper->addIdentifier('title')
            ->add ('date')
            ->add('photo')
            ->add('photos')
            ->add('active');

    }


    protected function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper->add('title','text',['label'=>'Название'])
            ->add ('date','datetime',['data'=>new \DateTime(),'label'=>'Дата'])
            ->add('photo', IphpFileType::class)
            ->add('photos')
            ->add('active');
    }
}