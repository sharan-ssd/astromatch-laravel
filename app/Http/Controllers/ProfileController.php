use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

public function editProfile()
{
    $userId = Auth::id();

    // fetch user details from custom table
    $userInfo = UserInfo::where('associatedUserID', $userId)->first();

    if (!$userInfo) {
        return redirect()->back()->with('error', 'Profile not found.');
    }

    return view('frontend.profile.editprofile', compact('userInfo'));
}
