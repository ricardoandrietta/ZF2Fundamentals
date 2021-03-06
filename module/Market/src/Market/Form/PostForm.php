<?php

namespace Market\Form;

use Zend\Form\Element\Date;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Url;
use Zend\Form\Form;

class PostForm extends Form
{

    private $categories;

    function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function buildForm()
    {
        $this->setAttribute('method', 'POST');

        $category = new Select('category');
        $category->setLabel('Category')
                ->setValueOptions(
                        array_combine($this->categories, $this->categories)
        );

        $title = new Text('title');
        $title->setLabel('Title')
                ->setAttributes(
                        array(
                            'size' => 60,
                            'maxLength' => 60
                        )
        );

        $dateExpires = new Date('date_expires');
        $dateExpires->setLabel('Date Expires')
                ->setAttributes(
                        array(
                            'min' => date('Y-m-d'),
                            'step' => '1'
                ))
                ->setOptions(array(
                    'format' => 'Y-m-d'
                ));

        $description = new Textarea('description');
        $description->setLabel('Description')
                ->setAttributes(
                        array(
                            'rows' => 3,
                            'cols' => 60
                ));

        $photoFilename = new Url('photo_filename');
        $photoFilename->setLabel('Photo Filename')
                ->setAttributes(
                        array(
                            'maxLength' => 1024
                ));

        $contactName = new Text('contact_name');
        $contactName->setLabel('Contact Name')
                ->setAttributes(
                        array(
                            'maxLength' => 255
                ));

        $contactEmail = new Text('contact_email');
        $contactEmail->setLabel('Contact e-mail')
                ->setAttributes(
                        array(
                            'maxLength' => 255
                ));

        $contactPhone = new Text('contact_phone');
        $contactPhone->setLabel('Contact Phone')
                ->setAttributes(
                        array(
                            'maxLength' => 32
                ));

        $city = new Text('city');
        $city->setLabel('City')
                ->setAttributes(
                        array(
                            'maxLength' => 128
                ));

        $contry = new Select('country');
        $contry->setLabel('Country')
                ->setValueOptions(array(
                    'br' => 'Brazil',
                    'us' => 'USA',
                    'cd' => 'Canada'
                ));

        $price = new Text('price');
        $price->setLabel('Price')
                ->setAttributes(
                        array(
                            'maxLength' => 13
                ));

        $deleteCode = new Text('delete_code');
        $deleteCode->setLabel('Delete Code')
                ->setAttributes(
                        array(
                            'maxLength' => 16
                ));

        /*
        //Deixaremos desativado por enquanto
        $captcha = new Captcha('segCaptcha');
        $captcha->setCaptcha(new \Zend\Captcha\Dumb())
                ->setLabel('Você é um humano ?');
        */
        $submit = new Submit('submit');
        $submit->setAttribute('value', 'Post');

        $this->add($category)
                ->add($title)
                ->add($dateExpires)
                ->add($description)
                ->add($photoFilename)
                ->add($contactName)
                ->add($contactEmail)
                ->add($contactPhone)
                ->add($contry)
                ->add($city)
                ->add($price)
                ->add($deleteCode)
                ->add($submit);
    }

}
