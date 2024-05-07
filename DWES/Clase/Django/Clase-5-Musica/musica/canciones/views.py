from django.views import generic
from .forms import CancionForm
from .models import Cancion
from django.urls import reverse_lazy

class CancionListView(generic.ListView):
    model = Cancion
    template_name = 'canciones/cancion_list.html'
    context_object_name = 'canciones'
    paginate_by = 3

class SubirCancionView(generic.FormView):
    template_name = 'canciones/subir_cancion.html'
    form_class = CancionForm

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    
    def get_success_url(self):
        return reverse_lazy('Canciones:listado') 


