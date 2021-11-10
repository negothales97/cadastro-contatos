<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ContactRepositoryInterface;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $categoryRepository;
    protected $contactRepository;
    protected $contactService;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ContactRepositoryInterface $contactRepository,
        ContactService $contactService
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->contactRepository = $contactRepository;
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactRepository->findBy([
            'user_id' => auth()->id(),
            'orderby' => 'name'
        ]);
        return view('pages.contact.index', compact('contacts'));
    }
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('pages.contact.create', compact('categories'));
    }

    public function store(ContactRequest $contactRequest)
    {
        $this->contactService->add($contactRequest->all());

        return redirect()
            ->route('contact.index')
            ->with('success', 'Contato adicionado com sucesso.');
    }

    public function edit($id)
    {
        $contact = $this->contactRepository->findById($id);

        $categories = $this->categoryRepository->getAll();

        return view('pages.contact.edit', compact('categories', 'contact'));
    }

    public function update(ContactRequest $contactRequest, $id)
    {
        $this->contactService->update($contactRequest->all(), $id);

        return redirect()
            ->back()
            ->with('success', 'Contato atualizado com sucesso.');
    }

    public function delete($id)
    {
        $this->contactRepository->delete($id);
        return redirect()
            ->back()
            ->with('success', 'Contato removido com sucesso');
    }

    public function search()
    {
        $contacts = $this->contactRepository->findBy([
            'name' => request('search'),
            'user_id' => request('user_id')
        ]);

        return response()->json($contacts);
    }
}
