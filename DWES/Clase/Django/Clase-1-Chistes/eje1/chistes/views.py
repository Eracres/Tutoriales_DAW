from django.shortcuts import render
from django.views import generic
from .models import Chiste

# Create your views here.

class ChisteListView(generic.ListView):
    model = Chiste