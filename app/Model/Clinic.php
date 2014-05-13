<?php
/**
 * Clinic Model
 *
 * PHP version 5.5
 *
 * @category Model
 * @version  1.0
 * @author   Eugene <vakuka@gmail.com>
 */
class Clinic extends AppModel {
    
	public $belongsTo = array(
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'user_id'
            )
        );
        public $hasMany = array(
            'Review' => array(
                'className' => 'Review',
                'foreignKey' => 'clinic_id'
             
            ),
            'Comment' => array(
                'className' => 'Comment',
                'foreignKey' => 'clinic_id'
            )
        );
       public $validate = array(
        'title' => array(
             'rule' => 'notEmpty',
             'message' => 'Title must not be empty.'
        ),         
        'content' => array(
             'rule' => 'notEmpty',
             'message' => 'Content must not be empty.'
         ),
        'address' => array(
             'rule' => 'notEmpty',
             'message' => 'Address must not be empty.'
         ),
        'phone' => array(
             'rule' => 'notEmpty',
             'message' => 'Phone must not be empty.'
         )          
        );
            
	public function updateViews($clnic) {
                //Get clinic Id from the Array $clnic
		$clinicId = Set::extract('/Clinic/id', $clnic);

                //Update clinic view in the DB
		$this->updateAll(
			array(
				'Clinic.views' => 'Clinic.views + 1',
			),
			array('Clinic.id' => $clinicId)
		);
	}        
       
        public function updateRank($clinicId) {
        
        $clinicReviews = $this->Review->find('all', array(
            'conditions' => array(
                'Review.clinic_id' => $clinicId
            )
        ));
        
        $reviewsNumber = count($clinicReviews);
        
        $sumReviewsRank = 0;
        foreach ($clinicReviews as $clinicReview) {
            $sumReviewsRank += $clinicReview['Review']['vote'];     
        }
        
        $clinicRank = round($sumReviewsRank / $reviewsNumber, 1);      

        $this->updateAll(
                array(
                        'Clinic.rank' => $clinicRank,
                ),
                array('Clinic.id' => $clinicId)
        );
	}
        
}
