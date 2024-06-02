from django.views.generic import ListView, DetailView
from .models import ObraDeArte
from rest_framework import viewsets
from .serializers import ObraDeArteSerializer

class ObraViewSet(viewsets.ModelViewSet):
    queryset = ObraDeArte.objects.all()
    serializer_class = ObraDeArteSerializer

class ObraListView(ListView):
    model = ObraDeArte
    template_name = 'obras/obra_list.html'
    context_object_name = 'obras'

class ObraDetailView(DetailView):
    model = ObraDeArte
    template_name = 'obras/obra_detail.html'
    context_object_name = 'obra'

