

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ensure the User model is imported
use Spatie\Permission\Traits\HasRoles;
class RedirectIfRole
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            // Redirigir según el rol
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('alumno')) {
                return redirect()->route('alumno.dashboard');
            } elseif ($user->hasRole('docente')) {
                return redirect()->route('docente.dashboard');
            } elseif ($user->hasRole('jefe')) {
                return redirect()->route('jefe.dashboard');
            }
            // Agregar más roles aquí según sea necesario.
        }

        return $next($request);
    }
}
