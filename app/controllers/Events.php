 <?php 
class Events extends Controller{

    public function __construct()
    {
        
        //new model instance
        $this->eventModel = $this->model('Event');
        $this->aspectModel = $this->model('Aspect');
    }

    public function index() {
        // Récupère la page actuelle et le terme de recherche
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $search_term = isset($_GET['search']) ? $_GET['search'] : '';
    
        $limit = 3;  // Nombre d'éléments par page
    
        // Si un terme de recherche est fourni, effectuez la recherche avec pagination
        if ($search_term) {
            $events = $this->eventModel->searchEvents($search_term, $page, $limit);
            $total_events = $this->eventModel->countSearchResults($search_term);
        } else {
            // Si pas de recherche, récupère tous les événements avec pagination
            $events = $this->eventModel->getEvents($page, $limit);
            $total_events = $this->eventModel->getEventCount();
        }
    
        // Calcul du nombre total de pages
        $total_pages = ceil($total_events / $limit);
    
        // Données à passer à la vue
        $data = [
            'events' => $events,
            'totalPages' => $total_pages,
            'currentPage' => $page,
            'searchTerm' => $search_term
        ];
    
        // Chargement de la vue
        $this->view('events/index', $data);
    }

    //add new event
    public function add() {
        // Nettoyage des données d'entrée
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        // Liste des régions disponibles
        $regions = ['North', 'South', 'East', 'West', 'Central'];
    
        // Récupérer les aspects de la base de données
        $aspects = $this->aspectModel->getAllAspects();
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image = '';
            if (!empty($_FILES['image']['name'])) {
                $targetDir = APPROOT . '/../public/uploads/';
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $targetFile = $targetDir . $imageName;
    
                // Validation de l'image
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
    
                if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                        $image = $imageName;
                    } else {
                        $data['image_err'] = 'Failed to upload image.';
                    }
                } else {
                    $data['image_err'] = 'Invalid file type.';
                }
            }
    
            // Préparer les données
            $data = [
                'nom' => trim($_POST['nom']),
                'region' => trim($_POST['region']),
                'description' => trim($_POST['description']),
                'image' => $image,
                'date' => trim($_POST['date']),
                'aspect' => trim($_POST['aspect']),
                'regions' => $regions,
                'aspects' => $aspects,
                'nom_err' => '',
                'region_err' => '',
                'description_err' => '',
                'image_err' => '',
                'date_err' => '',
                'aspect_err' => ''
            ];
    
            // Validation des données
            if (empty($data['nom'])) $data['nom_err'] = 'Please enter the event name.';
            if (empty($data['region'])) $data['region_err'] = 'Please select a region.';
            if (empty($data['description'])) $data['description_err'] = 'Please provide a description.';
            if (empty($data['date'])) $data['date_err'] = 'Please select a date.';
            if (empty($data['aspect'])) $data['aspect_err'] = 'Please select an aspect.';
    
            // Vérification finale
            if (empty($data['nom_err']) && empty($data['region_err']) && empty($data['description_err']) && empty($data['date_err']) && empty($data['aspect_err']) && empty($data['image_err'])) {
                if ($this->eventModel->addEvent($data)) {
                    flash('event_message', 'Event added successfully');
                    redirect('events');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('events/add', $data);
            }
        } else {
            // Si la méthode n'est pas POST, afficher le formulaire vide
            $data = [
                'nom' => '',
                'region' => '',
                'description' => '',
                'image' => '',
                'date' => '',
                'aspect' => '',
                'regions' => $regions,
                'aspects' => $aspects,
                'nom_err' => '',
                'region_err' => '',
                'description_err' => '',
                'image_err' => '',
                'date_err' => '',
                'aspect_err' => ''
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
    
    public function search(){
        // Vérification de la requête GET pour le terme de recherche
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search_term'])){
            // Nettoyer la saisie de l'utilisateur
            $search_term = trim($_GET['search_term']);
            
            // Recherche d'événements par nom ou description
            $events = $this->eventModel->searchEvents($search_term);
            
            $data = [
                'events' => $events,
                'search_term' => $search_term
            ];
            
            $this->view('events/index', $data);
        } else {
            // Rediriger vers la page d'index si aucune recherche n'est effectuée
            $this->index();
        }
    }
}