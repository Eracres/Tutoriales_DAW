from typing import Any
from django.shortcuts import render
from django.urls import reverse_lazy

from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView, FormMixin

from .models import Autor, Libro
from .forms import AutorForm, LibroForm

from .serializers import AutorSerializer, LibroSerializer
from rest_framework import viewsets

class AutorListView(FormMixin, ListView):
    model = Autor
    template_name = 'libros/autor_list.html'
    context_object_name = 'autores'
    form_class = AutorForm

class AutorDetailView(DetailView):
    model = Autor
    template_name = 'libros/autor_detail.html'
    context_object_name = 'autor'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["libros"] = self.object.libro_set.all()
        return context
       
class AutorFormView (FormView):
    model = Autor
    template_name = 'libros/autor_list.html'
    form_class = AutorForm
    success_url = reverse_lazy('AutorList')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    
    def form_invalid(self, form):
        context = self.get_context_data(form=form)
        return self.render_to_response(context)

class LibroFormView (FormView):
    model = Libro
    form_class = LibroForm
    template_name = 'libros/libro_form.html'
    success_url = reverse_lazy('AutorList')

    def form_valid(self, form):
        autor_slug = self.kwargs['slug']
        autor = Autor.objects.get(slug=autor_slug)
        form.instance.autor = autor
        form.save()
        return super().form_valid(form)
    
class LibroDetailView(DetailView):
    model = Libro
    template_name = 'libros/libro_detail.html'
    context_object_name = 'libro'

class AutorViewSet(viewsets.ModelViewSet):
    queryset = Autor.objects.all()
    serializer_class = AutorSerializer

class LibroViewSet(viewsets.ModelViewSet):
    queryset = Libro.objects.all()
    serializer_class = LibroSerializer