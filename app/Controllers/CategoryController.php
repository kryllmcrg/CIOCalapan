<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function dashboard()
    {
        return view('AdminPage/dashboard');
    }

    // Controller
public function addcategory()
{
    if ($this->request->getMethod() === 'post') {
        $categoryModel = new CategoryModel();
        $categoryName = $this->request->getPost('category_name');

        try {
            // Insert the new category into the database
            $categoryModel->insert(['category_name' => $categoryName]);
            
            // Set success message
            session()->setFlashdata('success', 'Category added successfully.');
        } catch (\Exception $e) {
            // Set error message
            session()->setFlashdata('error', 'Failed to add category.');
        }

        // Redirect to prevent form resubmission
        return redirect()->to('/addcategory');
    } else {
        return view('AdminPage/addcategory');
    }
}


    public function getcategory()
    {
        // Load the CategoryModel
        $categoryModel = new CategoryModel();

        // Fetch all categories from the database
        $data['category'] = $categoryModel->findAll();

        return view('home', $data);
    }

    public function manageCategory()
    {
        $categoryModel = new CategoryModel();
        
        $data['categoryData'] = $categoryModel->findAll();
        
        return view('AdminPage/managecategory', $data);
    }

    public function deleteCategory()
    {
        // Load the necessary helpers and libraries
        helper(['form', 'url']);

        // Get the category ID from the POST request
        $categoryId = $this->request->getPost('category_id');

        // Load the CategoryModel
        $categoryModel = new CategoryModel();

        // Delete the category from the database
        $deleted = $categoryModel->delete($categoryId);

        // Check if the deletion was successful
        if ($deleted) {
            // If successful, return success response
            return $this->response->setJSON(['success' => true, 'message' => 'Category deleted successfully']);
        } else {
            // If deletion failed, return error response
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete category']);
        }
    }
    public function saveCategoryChanges()
    {
        try {
            // Retrieve the category ID and new category name from the request
            $categoryId = $this->request->getPost('category_id'); // Adjusted to match the attribute name
            $newCategoryName = $this->request->getPost('editCategory');

            // Validate inputs if necessary

            // Update the category in the database
            $categoryModel = new CategoryModel();
            $categoryModel->update($categoryId, ['category_name' => $newCategoryName]);

            // If successful, return success response
            return $this->response->setJSON(['success' => true, 'message' => 'Category updated successfully']);
        } catch (\Exception $e) {
            // If an error occurs, return error response
            return $this->response->setJSON(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    
    public function addcategoryStaff()
    {
        if ($this->request->getMethod() === 'post') {
            $categoryModel = new CategoryModel();
            $categoryName = $this->request->getPost('category_name');

            try {
                // Insert the new category into the database
                $categoryModel->insert(['category_name' => $categoryName]);
                
                // Set success message
                session()->setFlashdata('success', 'Category added successfully.');
            } catch (\Exception $e) {
                // Set error message
                session()->setFlashdata('error', 'Failed to add category.');
            }

            // Redirect to prevent form resubmission
            return redirect()->to('/addcategoryStaff');
        } else {
            return view('StaffPage/addcategoryStaff');
        }
    }
    public function getcategoryStaff()
    {
        // Load the CategoryModel
        $categoryModel = new CategoryModel();

        // Fetch all categories from the database
        $data['category'] = $categoryModel->findAll();

        return view('home', $data);
    }

    public function manageCategoryStaff()
    {
        $categoryModel = new CategoryModel();
        
        $data['categoryData'] = $categoryModel->findAll();
        
        return view('AdminPage/managecategory', $data);
    }

    public function deleteCategoryStaff()
    {
        // Load the request library if not loaded already
        helper(['form', 'url']);

        // Get the category ID from the request
        $categoryId = $this->request->getPost('category_id');

        // Delete the category from the database
        $categoryModel = new CategoryModel();
        $categoryModel->delete($categoryId);

        // If successful, return success response
        return $this->response->setJSON(['success' => true, 'message' => 'Category deleted successfully']);
    }
    public function changecategoryStaff()
    {
        try {
            // Retrieve the category ID and new category name from the request
            $categoryId = $this->request->getPost('category_id'); // Adjusted to match the attribute name
            $newCategoryName = $this->request->getPost('editCategory');

            // Validate inputs if necessary

            // Update the category in the database
            $categoryModel = new CategoryModel();
            $categoryModel->update($categoryId, ['category_name' => $newCategoryName]);

            // If successful, return success response
            return $this->response->setJSON(['success' => true, 'message' => 'Category updated successfully']);
        } catch (\Exception $e) {
            // If an error occurs, return error response
            return $this->response->setJSON(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

}
