import { Star } from "lucide-react";

const testimonials = [
  {
    quote: "KIDazzle has been incredible for our daughter. The teachers are so nurturing and the curriculum is amazing. She's learned so much!",
    author: "Sarah M.",
    role: "Parent of 4-year-old",
    rating: 5,
  },
  {
    quote: "Best decision we made for our kids. The facility is clean, safe, and the staff truly cares about each child's development.",
    author: "Michael & Jessica T.",
    role: "Parents of 2",
    rating: 5,
  },
  {
    quote: "My son was shy when he started. Now he's confident, makes friends easily, and can't wait to go to school every day!",
    author: "Amanda R.",
    role: "Parent of 3-year-old",
    rating: 5,
  },
];

const Testimonials = () => {
  return (
    <section className="section-padding bg-background">
      <div className="container-site">
        {/* Section Header */}
        <div className="text-center max-w-2xl mx-auto mb-16">
          <span className="text-secondary font-semibold text-sm uppercase tracking-wider">
            Testimonials
          </span>
          <h2 className="text-3xl md:text-4xl font-bold mt-3 mb-4">
            What Families Say
          </h2>
          <p className="text-muted-foreground text-lg">
            Hear from the families who've experienced the KIDazzle difference.
          </p>
        </div>

        {/* Testimonials Grid */}
        <div className="grid md:grid-cols-3 gap-8">
          {testimonials.map((testimonial, index) => (
            <div
              key={index}
              className="bg-card rounded-2xl p-8 shadow-soft hover:shadow-medium transition-shadow duration-300"
            >
              {/* Rating */}
              <div className="flex gap-1 mb-4">
                {[...Array(testimonial.rating)].map((_, i) => (
                  <Star key={i} className="h-5 w-5 fill-secondary text-secondary" />
                ))}
              </div>

              {/* Quote */}
              <blockquote className="text-foreground leading-relaxed mb-6">
                "{testimonial.quote}"
              </blockquote>

              {/* Author */}
              <div className="flex items-center gap-3">
                <div className="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-primary-light flex items-center justify-center text-primary-foreground font-bold text-lg">
                  {testimonial.author.charAt(0)}
                </div>
                <div>
                  <p className="font-semibold text-foreground">{testimonial.author}</p>
                  <p className="text-sm text-muted-foreground">{testimonial.role}</p>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Testimonials;