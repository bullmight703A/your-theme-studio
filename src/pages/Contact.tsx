import { useState } from "react";
import Layout from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Label } from "@/components/ui/label";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { toast } from "sonner";
import { MapPin, Phone, Mail, Clock, Send, Calendar, CheckCircle2 } from "lucide-react";

const Contact = () => {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    phone: "",
    childAge: "",
    location: "",
    message: "",
    inquiryType: ""
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // Form submission logic would go here
    toast.success("Thank you! We'll contact you shortly.", {
      description: "A member of our team will reach out within 24 hours."
    });
    setFormData({
      name: "",
      email: "",
      phone: "",
      childAge: "",
      location: "",
      message: "",
      inquiryType: ""
    });
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setFormData(prev => ({
      ...prev,
      [e.target.name]: e.target.value
    }));
  };

  return (
    <Layout>
      {/* Hero Section */}
      <section className="bg-gradient-soft py-16 md:py-24">
        <div className="container-site">
          <div className="max-w-3xl mx-auto text-center">
            <div className="inline-flex items-center gap-2 bg-secondary/20 text-secondary-foreground px-4 py-2 rounded-full text-sm font-medium mb-6">
              <Calendar className="h-4 w-4" />
              Schedule a Visit
            </div>
            <h1 className="text-4xl md:text-5xl font-bold mb-6">
              Let's Start Your Child's{" "}
              <span className="text-primary">Journey</span>
            </h1>
            <p className="text-lg text-muted-foreground">
              Ready to see what makes KIDazzle special? Book a tour or reach out with questions—we'd love to hear from you!
            </p>
          </div>
        </div>
      </section>

      {/* Main Content */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid lg:grid-cols-2 gap-12">
            {/* Contact Form */}
            <div className="bg-card rounded-2xl p-8 shadow-soft">
              <h2 className="text-2xl font-bold mb-6">Get in Touch</h2>
              <form onSubmit={handleSubmit} className="space-y-6">
                <div className="grid md:grid-cols-2 gap-4">
                  <div className="space-y-2">
                    <Label htmlFor="name">Parent/Guardian Name *</Label>
                    <Input
                      id="name"
                      name="name"
                      value={formData.name}
                      onChange={handleChange}
                      placeholder="Your full name"
                      required
                    />
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="phone">Phone Number *</Label>
                    <Input
                      id="phone"
                      name="phone"
                      type="tel"
                      value={formData.phone}
                      onChange={handleChange}
                      placeholder="(404) 555-0100"
                      required
                    />
                  </div>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="email">Email Address *</Label>
                  <Input
                    id="email"
                    name="email"
                    type="email"
                    value={formData.email}
                    onChange={handleChange}
                    placeholder="you@example.com"
                    required
                  />
                </div>

                <div className="grid md:grid-cols-2 gap-4">
                  <div className="space-y-2">
                    <Label htmlFor="childAge">Child's Age</Label>
                    <Select
                      value={formData.childAge}
                      onValueChange={(value) => setFormData(prev => ({ ...prev, childAge: value }))}
                    >
                      <SelectTrigger>
                        <SelectValue placeholder="Select age range" />
                      </SelectTrigger>
                      <SelectContent>
                        <SelectItem value="infant">6 weeks - 12 months</SelectItem>
                        <SelectItem value="toddler">1 - 2 years</SelectItem>
                        <SelectItem value="preschool">3 - 4 years</SelectItem>
                        <SelectItem value="prek">4 - 5 years</SelectItem>
                        <SelectItem value="school-age">5 - 12 years</SelectItem>
                      </SelectContent>
                    </Select>
                  </div>
                  <div className="space-y-2">
                    <Label htmlFor="location">Preferred Location</Label>
                    <Select
                      value={formData.location}
                      onValueChange={(value) => setFormData(prev => ({ ...prev, location: value }))}
                    >
                      <SelectTrigger>
                        <SelectValue placeholder="Select location" />
                      </SelectTrigger>
                      <SelectContent>
                        <SelectItem value="west-end">West End</SelectItem>
                        <SelectItem value="midtown">Midtown</SelectItem>
                        <SelectItem value="buckhead">Buckhead</SelectItem>
                      </SelectContent>
                    </Select>
                  </div>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="inquiryType">Inquiry Type</Label>
                  <Select
                    value={formData.inquiryType}
                    onValueChange={(value) => setFormData(prev => ({ ...prev, inquiryType: value }))}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="What can we help with?" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="tour">Schedule a Tour</SelectItem>
                      <SelectItem value="enrollment">Enrollment Information</SelectItem>
                      <SelectItem value="programs">Program Details</SelectItem>
                      <SelectItem value="pricing">Pricing & Tuition</SelectItem>
                      <SelectItem value="other">Other</SelectItem>
                    </SelectContent>
                  </Select>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="message">Message</Label>
                  <Textarea
                    id="message"
                    name="message"
                    value={formData.message}
                    onChange={handleChange}
                    placeholder="Tell us about your child and any questions you have..."
                    rows={4}
                  />
                </div>

                <Button type="submit" size="lg" className="w-full btn-secondary rounded-full">
                  <Send className="mr-2 h-5 w-5" />
                  Send Message
                </Button>
              </form>
            </div>

            {/* Contact Info */}
            <div className="space-y-8">
              <div>
                <h2 className="text-2xl font-bold mb-6">Contact Information</h2>
                <div className="space-y-6">
                  <div className="flex items-start gap-4">
                    <div className="p-3 bg-primary/10 rounded-xl">
                      <Phone className="h-6 w-6 text-primary" />
                    </div>
                    <div>
                      <h3 className="font-semibold mb-1">Phone</h3>
                      <p className="text-muted-foreground">(404) 555-0100</p>
                      <p className="text-sm text-muted-foreground">Mon-Fri, 6:30 AM - 6:30 PM</p>
                    </div>
                  </div>
                  <div className="flex items-start gap-4">
                    <div className="p-3 bg-primary/10 rounded-xl">
                      <Mail className="h-6 w-6 text-primary" />
                    </div>
                    <div>
                      <h3 className="font-semibold mb-1">Email</h3>
                      <a href="mailto:info@kidazzle.com" className="text-muted-foreground hover:text-primary transition-colors">
                        info@kidazzle.com
                      </a>
                    </div>
                  </div>
                  <div className="flex items-start gap-4">
                    <div className="p-3 bg-primary/10 rounded-xl">
                      <Clock className="h-6 w-6 text-primary" />
                    </div>
                    <div>
                      <h3 className="font-semibold mb-1">Hours</h3>
                      <p className="text-muted-foreground">Monday - Friday</p>
                      <p className="text-muted-foreground">6:30 AM - 6:30 PM</p>
                    </div>
                  </div>
                </div>
              </div>

              {/* Why Choose Us */}
              <div className="bg-muted/50 rounded-2xl p-6">
                <h3 className="text-xl font-bold mb-4">Why Families Choose Us</h3>
                <div className="space-y-3">
                  {[
                    "Quality Rated childcare centers",
                    "Experienced, caring educators",
                    "Research-based curriculum",
                    "Safe and nurturing environment",
                    "Flexible scheduling options",
                    "Parent communication app"
                  ].map((item, index) => (
                    <div key={index} className="flex items-center gap-3">
                      <CheckCircle2 className="h-5 w-5 text-primary flex-shrink-0" />
                      <span className="text-sm">{item}</span>
                    </div>
                  ))}
                </div>
              </div>

              {/* Locations Quick Links */}
              <div className="bg-card rounded-2xl p-6 shadow-soft">
                <h3 className="text-xl font-bold mb-4">Our Locations</h3>
                <div className="space-y-4">
                  {[
                    { name: "West End", address: "1234 West End Ave" },
                    { name: "Midtown", address: "567 Peachtree St NE" },
                    { name: "Buckhead", address: "890 Lenox Road NE" }
                  ].map((loc) => (
                    <div key={loc.name} className="flex items-center gap-3">
                      <MapPin className="h-5 w-5 text-primary flex-shrink-0" />
                      <div>
                        <p className="font-medium">{loc.name}</p>
                        <p className="text-sm text-muted-foreground">{loc.address}</p>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default Contact;
