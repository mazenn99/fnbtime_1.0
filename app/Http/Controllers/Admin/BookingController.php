<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApproveBooking;
use App\Mail\CancelBooking;
use App\Model\Booking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::with(['restaurant' => function ($q) {
            $q->select('id', 'name', 'country_id', 'city_id', 'number');
        }])->where('status', 0)->orderBy('id', 'DESC')->paginate(PAGINATE_COUNT);
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Here we display all booking
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $bookings = Booking::with(['restaurant' => function ($q) {
            $q->select('id', 'name', 'country_id', 'city_id', 'number');
        }])->orderBy('id', 'DESC')->paginate(PAGINATE_COUNT);
        return view('admin.booking.allBooking', compact('bookings'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Booking $booking)
    {
        Mail::to($booking->user->email)->send(new ApproveBooking($booking));
        $booking->update(['status' => 1]);
        return redirect()->back()->with(['success' => 'successfully Approved the booking']);
    }

    /**
     * Here we canceled the booking and change
     * the status to 2 not deleted it
     * @param Booking $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->update(['status' => 2]);
        Mail::to($booking->user->email)->send(new CancelBooking($booking));
        return redirect()->back()->with(['success' => 'successfully canceled the booking']);
    }

    public function searchInput(Request $request)
    {
        $output = '';
        $bookings = Booking::where('name', 'like', '%' . $request->input('search') . '%')
            ->orWhere('booking_number', 'like', '%' . $request->input('search') . '%')
            ->where('status', 0)
            ->get();
        if (!(empty($bookings))) {
            foreach ($bookings as $booking) {
                $output .= '
                    <tr>
                            <td>' . $booking->id . '</td>
                            <td>' . $booking->name . '</a></td>
                            <td>' . $booking->restaurant->name . '</td>
                            <td>' . $booking->booking_number . '</td>
                            <td>' . $booking->restaurant->number . '</td>
                            <td>' . $booking->restaurant->country->name . '</td>
                            <td>' . $booking->restaurant->city->name . '</td>
                            <td>' . $booking->phone_costumer . '</td>
                            <td>' . $booking->person_number . '</td>
                            <td>' . $booking->occasion_date . '</td>
                            <td>' . $booking->time . '</td>
                            <td>' . $booking->date_booking . '</td>
                            <td>' . $booking->getStatus() . '</td>
                            <td>

                                <form action=' . route('booking.update', $booking->id) . ' class="d-inline-block" method="POST">
                                    ' . @csrf_field() . '
                                    ' . method_field('PUT') . '
                                    <button
                                       class="btn btn-sm btn-outline-primary">Approved</button>
                                </form>

                                <form action=' . route('booking.destroy', $booking->id) . ' class="d-inline-block" method="POST">
                                    ' . @csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button class="btn btn-sm btn-outline-danger">
                                        Canceled
                                    </button>
                                </form>
                            </td>
                        </tr>
            ';
            }
            return response()->json($output);
        } else {
            $output = '
                <tr>
                    <td class="text-danger text-center">No Data found</td>
                </tr>
            ';
            return response()->json($output);
        }
    }

    public function searchAllBooking(Request $request)
    {
        $output = '';
        $bookings = Booking::where('name', 'like', '%' . $request->input('search') . '%')
            ->orWhere('booking_number', 'like', '%' . $request->input('search') . '%')
            ->get();
        if (!(empty($bookings))) {
            foreach ($bookings as $booking) {
                $output .= '
                    <tr>
                            <td>' . $booking->id . '</td>
                            <td>' . $booking->name . '</a></td>
                            <td>' . $booking->restaurant->name . '</td>
                            <td>' . $booking->booking_number . '</td>
                            <td>' . $booking->restaurant->number . '</td>
                            <td>' . $booking->restaurant->country->name . '</td>
                            <td>' . $booking->restaurant->city->name . '</td>
                            <td>' . $booking->phone_costumer . '</td>
                            <td>' . $booking->person_number . '</td>
                            <td>' . $booking->occasion_date . '</td>
                            <td>' . $booking->time . '</td>
                            <td>' . $booking->date_booking . '</td>
                            <td>' . $booking->getStatus() . '</td>
                            <td>

                                <form action=' . route('booking.update', $booking->id) . ' class="d-inline-block" method="POST">
                                    ' . @csrf_field() . '
                                    ' . method_field('PUT') . '
                                    <button
                                       class="btn btn-sm btn-outline-primary">Approved</button>
                                </form>

                                <form action=' . route('booking.destroy', $booking->id) . ' class="d-inline-block" method="POST">
                                    ' . @csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button class="btn btn-sm btn-outline-danger">
                                        Canceled
                                    </button>
                                </form>
                            </td>
                        </tr>
            ';
            }
            return response()->json($output);
        } else {
            $output = '
                <tr>
                    <td class="text-danger text-center">No Data found</td>
                </tr>
            ';
            return response()->json($output);
        }
    }

}
