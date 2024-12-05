<?php 
class Events extends Controller{

    public function __construct()
    {
        
        //new model instance
        $this->eventModel = $this->model('Event');
        $this->aspectModel = $this->model('Aspect');
    }

    public function index(){

        $events = $this->eventModel->getEvents();
        $data = [
            'events' => $events
        ];

        $this->view('events/index', $data);
    }

    //add new event
    public function add(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        // List of available regions
        $regions = ['North', 'South', 'East', 'West', 'Central'];
    
        // Récupérer les aspects de la base de données
        $aspects = $this->aspectModel->getAllAspects(); // Assurez-vous que cette méthode existe dans le modèle Aspect
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'nom' => trim($_POST['nom']),
                'region' => trim($_POST['region']),
                'description' => trim($_POST['description']),
                'image' => isset($_POST['image']) ? trim($_POST['image']) : '',
                'date' => trim($_POST['date']),
                'aspect' => isset($_POST['aspect']) ? $_POST['aspect'] : null,
                'regions' => $regions,
                'aspects' => $aspects, // Ajouter la liste des aspects
                'nom_err' => '',
                'description_err' => '',
                'date_err' => '',
                'region_err' => '',
                'aspect_err' => '',
                'image_err' => ''
            ];
    
            // Validation
            if(empty($data['nom'])){
                $data['nom_err'] = 'Please enter the event name.';
            }
            if(empty($data['description'])){
                $data['description_err'] = 'Please enter the event description.';
            }
            if(empty($data['date'])){
                $data['date_err'] = 'Please enter the event date.';
            }
            if(!in_array($data['region'], $regions)){
                $data['region_err'] = 'Please select a valid region.';
            }
            if(empty($data['aspect'])){
                $data['aspect_err'] = 'Please select an aspect.';
            }
    
            // If no errors, proceed to save
            if(empty($data['nom_err']) && empty($data['description_err']) && empty($data['date_err']) && empty($data['region_err']) && empty($data['aspect_err'])){
                if($this->eventModel->addEvent($data)){
                    flash('event_message', 'Event has been added');
                    redirect('events');
                }else{
                    die('Something went wrong');
                }
            }else{
                // Reload form with errors
                $this->view('events/add', $data);
            }
        }else{
            $data = [
                'nom' => '',
                'region' => '',
                'description' => '',
                'image' => '',
                'date' => '',
                'aspect' => '',
                'regions' => $regions,
                'aspects' => $aspects // Passer la liste des aspects à la vue
            ];
    
            $this->view('events/add', $data);
        }
    }
    
    

    //show single event 
    public function show($id){
        $event = $this->eventModel->getEventById($id);
        $aspect = $this->aspectModel->getAspectById($event->aspect);

        $data = [
            'event' => $event,
            'aspect' => $aspect
        ];

        $this->view('events/show', $data);
    }

    //edit event
    public function edit($id){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        // List of available regions and aspects
        $regions = ['North', 'South', 'East', 'West', 'Central'];
        $aspects = $this->eventModel->getAllAspects(); // Récupérer la liste des aspects depuis la base de données
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'id_event' => $id,
                'nom' => trim($_POST['nom']),
                'region' => trim($_POST['region']),
                'description' => trim($_POST['description']),
                'image' => trim($_POST['image']),
                'date' => trim($_POST['date']),
                'aspect' => isset($_POST['aspect']) ? $_POST['aspect'] : null,
                'regions' => $regions,
                'aspects' => $aspects,
                'nom_err' => '',
                'description_err' => '',
                'date_err' => '',
                'region_err' => '',
                'aspect_err' => ''
            ];
    
            // Validation
            if(empty($data['nom'])){
                $data['nom_err'] = 'Please enter the event name.';
            }
            if(empty($data['description'])){
                $data['description_err'] = 'Please enter the event description.';
            }
            if(empty($data['date'])){
                $data['date_err'] = 'Please enter the event date.';
            }
            if(!in_array($data['region'], $regions)){
                $data['region_err'] = 'Please select a valid region.';
            }
            if(empty($data['aspect'])){
                $data['aspect_err'] = 'Please select an aspect.';
            }
    
            // If no errors, proceed to update
            if(empty($data['nom_err']) && empty($data['description_err']) && empty($data['date_err']) && empty($data['region_err']) && empty($data['aspect_err'])){
                if($this->eventModel->updateEvent($data)){
                    flash('event_message', 'Event has been updated');
                    redirect('events');
                }else{
                    die('Something went wrong');
                }
            }else{
                // Reload form with errors
                $this->view('events/edit', $data);
            }
        }else{
            $event = $this->eventModel->getEventById($id);
            $data = [
                'id_event' => $id,
                'nom' => $event->nom,
                'region' => $event->region,
                'description' => $event->description,
                'image' => $event->image,
                'date' => $event->date,
                'aspect' => $event->aspect,
                'regions' => $regions,
                'aspects' => $aspects // Pass the available aspects to the view
            ];
    
            $this->view('events/edit', $data);
        }
    }
    

    //delete event
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->eventModel->deleteEvent($id)){
                flash('event_message', 'Event Removed');
                redirect('events');
            }else{
                die('Something went wrong');
            }
        }else{
            redirect('events');
        }
    }
}