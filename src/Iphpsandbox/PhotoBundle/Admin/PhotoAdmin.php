<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20.05.17
 * Time: 17:48
 */

namespace Iphpsandbox\PhotoBundle\Admin;

use Doctrine\DBAL\Types\BooleanType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Iphp\FileStoreBundle\Form\Type\FileType as IphpFileType;

class PhotoAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        return $listMapper->addIdentifier('title')
            ->add('topic')
            ->add ('date')
            ->add('active');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper->add('title','text',['label'=>'Название'])
            ->add('topic','text',['label'=>'Тематика'])
            ->add ('date','datetime',['data'=>new \DateTime(),'label'=>'Дата'])
            ->add('photo', IphpFileType::class)
            ->add('active');
    }
}