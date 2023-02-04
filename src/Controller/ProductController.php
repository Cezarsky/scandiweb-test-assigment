<?php

declare(strict_types=1);

namespace App\Controller;

class ProductController extends AbstractController
{
    public function createAction(): void
    {

        // if (!$this->conn->exist($data['sku'])) {
        //     return;
        // }
        if ($this->request->hasPost()) {
            $productData = [
                'sku' => $this->request->postParam('sku'),
                'name' => $this->request->postParam('name'),
                'price' => $this->request->postParam('price'),
                'category' => $this->request->postParam('productType')
            ];
            if ($this->request->postNotNull('size')) {
                $productData['size'] = $this->request->postParam('size');
            }
            if ($this->request->postNotNull('height')) {
                $productData['height'] = $this->request->postParam('height');
            }
            if ($this->request->postNotNull('width')) {
                $productData['width'] = $this->request->postParam('width');
            }
            if ($this->request->postNotNull('length')) {
                $productData['length'] = $this->request->postParam('length');
            }
            if ($this->request->postNotNull('weight')) {
                $productData['weight'] = $this->request->postParam('weight');
            }

            if ($this->productModel->exist($productData['sku'])) {
                $this->redirect('/product-add.php', ['sku' => 'SKU_already_exist']);
            }
            $this->productModel->create($productData);
            $this->redirect('/', ['before' => 'created']);
        }
    }

    public function listAction()
    {
        $productList = $this->productModel->list();

        $this->view->render('list', ['products' => $productList]);
    }

    public function deleteAction(): void
    {
        if ($this->request->hasPost()) {
            $ids = $this->request->postParam('ID');
            foreach ($ids as $id) {
                $delete_id = (int) $id;
                $this->productModel->delete($delete_id);
            }
        }
        $this->redirect('/', []);
    }
}



/*

                'size' => $this->request->postParam('size'),
                'height' => $this->request->postParam('height'),
                'width' => $this->request->postParam('width'),
                'length' => $this->request->postParam('length'),
                'weight' => $this->request->postParam('weight')
*/