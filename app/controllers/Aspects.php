<?php 
class Aspects extends Controller {

    public function __construct() {
        $this->aspectModel = $this->model('Aspect');
     
    }

    public function index() {
        // Récupère la page actuelle et le terme de recherche
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
    
        $perPage = 3;  // Nombre d'éléments par page
    
        // Si un terme de recherche est fourni, effectuez la recherche avec pagination
        if ($searchTerm) {
            $aspects = $this->aspectModel->searchAspects($searchTerm, $page, $perPage);
            $totalAspects = $this->aspectModel->countSearchResults($searchTerm);
        } else {
            // Si pas de recherche, récupère tous les aspects avec pagination
            $aspects = $this->aspectModel->getAspects($page, $perPage);
            $totalAspects = $this->aspectModel->getTotalAspects();
        }
    
        // Calculer le nombre total de pages
        $totalPages = ceil($totalAspects / $perPage);
    
        // Données à passer à la vue
        $data = [
            'aspects' => $aspects,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'searchTerm' => $searchTerm  // Ajoutez le terme de recherche dans les données
        ];
    
        // Chargement de la vue
        $this->view('aspects/index', $data);
    }
    
    
    
    
    
    // Add new aspect
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image = '';
            if (!empty($_FILES['image_aspect']['name'])) {
                $targetDir = APPROOT . '/../public/uploads/';
                $imageName = time() . '_' . basename($_FILES['image_aspect']['name']);
                $targetFile = $targetDir . $imageName;
    
                // Validation de l'image
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
    
                if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                    if (move_uploaded_file($_FILES['image_aspect']['tmp_name'], $targetFile)) {
                        $image = $imageName;
                    } else {
                        $data['image_aspect_err'] = 'Failed to upload image.';
                    }
                } else {
                    $data['image_aspect_err'] = 'Invalid file type.';
                }
            }
            $data = [
                'nom_aspect' => trim($_POST['nom_aspect']),
                'categorie' => trim($_POST['categorie']),
                'description_aspect' => trim($_POST['description_aspect']),
                'image_aspect' => '',
                'nom_aspect_err' => '',
                'categorie_err' => '',
                'description_aspect_err' => ''
            ];

            // Validation
            if (empty($data['nom_aspect'])) {
                $data['nom_aspect_err'] = 'Please enter the aspect name';
            }
            if (empty($data['categorie'])) {
                $data['categorie_err'] = 'Please select a category';
            }
            if (empty($data['description_aspect'])) {
                $data['description_aspect_err'] = 'Please enter a description';
            }


            // Si tout est valide
            if (empty($data['nom_aspect_err']) && empty($data['categorie_err']) && empty($data['description_aspect_err']) && empty($data['image_aspect_err'])) {
                if ($this->aspectModel->addAspect($data)) {
                    flash('aspect_message', 'Your aspect has been added');
                    redirect('aspects');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('aspects/add', $data);
            }
        } else {
            $data = [
                'nom_aspect' => '',
                'categorie' => '',
                'description_aspect' => '',
                'image_aspect' => ''
            ];

            $this->view('aspects/add', $data);
        }
    }

    // Show single aspect
    public function show($id) {
        $aspect = $this->aspectModel->getAspectById($id);
        

        $data = [
            'aspect' => $aspect,
            
        ];

        $this->view('aspects/show', $data);
    }

    // Edit aspect
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id_aspect' => $id,
                'nom_aspect' => trim($_POST['nom_aspect']),
                'categorie' => trim($_POST['categorie']),
                'description_aspect' => trim($_POST['description_aspect']),
                'nom_aspect_err' => '',
                'categorie_err' => '',
                'description_aspect_err' => ''
            ];

            if (empty($data['nom_aspect'])) {
                $data['nom_aspect_err'] = 'Please enter the aspect name';
            }
            if (empty($data['categorie'])) {
                $data['categorie_err'] = 'Please enter the category';
            }
            if (empty($data['description_aspect'])) {
                $data['description_aspect_err'] = 'Please enter a description';
            }

            if (empty($data['nom_aspect_err']) && empty($data['categorie_err']) && empty($data['description_aspect_err'])) {
                if ($this->aspectModel->updateAspect($data)) {
                    flash('aspect_message', 'Your aspect has been updated');
                    redirect('aspects');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('aspects/edit', $data);
            }
        } else {
            $aspect = $this->aspectModel->getAspectById($id);
        
            $data = [
                'id' => $id,
                'nom_aspect' => $aspect->nom_aspect,
                'categorie' => $aspect->categorie,
                'description_aspect' => $aspect->description_aspect
            ];

            $this->view('aspects/edit', $data);
        }
    }

    // Delete aspect
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $aspect = $this->aspectModel->getAspectById($id);
          

            if ($this->aspectModel->deleteAspect($id)) {
                flash('aspect_message', 'Aspect Removed');
                redirect('aspects');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('aspects');
        }
    }

    public function search(){
        // Vérification de la requête GET pour le terme de recherche
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['searchTerm'])){
            // Nettoyer la saisie de l'utilisateur
            $searchTerm = trim($_GET['searchTerm']);
            
            // Recherche d'événements par nom ou description
            $events = $this->eventModel->searchEvents($searchTerm);
            
            $data = [
                'events' => $events,
                'searchTerm' => $searchTerm
            ];
            
            $this->view('aspects/index', $data);
        } else {
            // Rediriger vers la page d'index si aucune recherche n'est effectuée
            $this->index();
        }
    }
    
    
    
}
?>