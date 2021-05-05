INSERT INTO t_featured-models (title,description, price,image_name ,gift_package_id, featured, active) 
VALUES ("titoe","descr","1000", "imagename","0","featured","yes");

INSERT INTO `t_featured-models`(`title`,`description`,`price`,`image_name`,`gift_package_id`,`featured`,`active`)
VALUES ("titoe","descr","1000", "imagename","0","featured","yes");


UPDATE `t_featured-models` SET
               `title`= 'title',
               `description `= ' description ',
               `price` = '123',
               `image_name` = 'petka.jpg',
               `category`= '5',
               `featured`= 'yes',
               `active` = 'no',
                WHERE id=125;



              title ='t_TITLE',
              description='t_DESCRIPTION',
             price = '1000',
             image_name ='t_IMAGENAME',
             category_id ='t_CATID',
             featured = 'FEATURED',
             active = '$true';