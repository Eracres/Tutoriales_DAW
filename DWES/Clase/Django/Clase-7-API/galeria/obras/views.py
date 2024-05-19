from django.shortcuts import render, get_object_or_404
from .models import ObraDeArte
from .serializers import ObraDeArteSerializer
from rest_framework import generics

class ObraDeArteListCreate(generics.ListCreateAPIView):
    queryset = ObraDeArte.objects.all()
    serializer_class = ObraDeArteSerializer

class ObraDeArteRetrieveUpdateDestroy(generics.RetrieveUpdateDestroyAPIView):
    queryset = ObraDeArte.objects.all()
    serializer_class = ObraDeArteSerializer

def obra_list(request):
    obras = ObraDeArte.objects.all()
    return render(request, 'obras/obra_list.html', {'obras': obras})

def obra_detail(request, slug):
    obra = get_object_or_404(ObraDeArte, slug=slug)
    return render(request, 'obras/obra_detail.html', {'obra': obra})
